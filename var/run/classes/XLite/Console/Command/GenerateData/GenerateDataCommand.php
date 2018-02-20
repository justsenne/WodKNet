<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Console\Command\GenerateData;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use XLite\Console\Command\GenerateData\Generators\Category;
use XLite\Console\Command\GenerateData\Generators\Order;
use XLite\Console\Command\GenerateData\Generators\Product;

/**
 * Class StoreDataToYamlCommand
 * @package XLite\Console\Command
 */
class GenerateDataCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('generate:all')
            ->setDescription('Generate entities')
            ->setHelp('Generates entities of various types up to the specified limit. Removes all existing entities of selected type before the process.')

            ->addOption('categories', 'c', InputOption::VALUE_REQUIRED, 'Categories count per level')
            ->addOption('categoryImage', 'I', InputOption::VALUE_NONE, 'Generate categories with image')
            ->addOption('depth', 'd', InputOption::VALUE_REQUIRED, 'Categories depth')

            ->addOption('products', 'p', InputOption::VALUE_REQUIRED, 'Product per category')
            ->addOption('attributes', 'a', InputOption::VALUE_REQUIRED, 'Attributes per product')
            ->addOption('options', 'o', InputOption::VALUE_REQUIRED, 'Options per product')
            ->addOption('optionsValues', 'val', InputOption::VALUE_REQUIRED, 'Option values per product')
            ->addOption('productImages', 'i', InputOption::VALUE_REQUIRED, 'Images per product')
            ->addOption('wholesalePrices', 'w', InputOption::VALUE_REQUIRED, 'Wholesale prices per product')

            ->addOption('featuredProducts', 'f', InputOption::VALUE_REQUIRED, 'Featured products per category')

            ->addOption('orders', 'r', InputOption::VALUE_REQUIRED, 'Orders to create')
            ->addOption('orderItems', 'O', InputOption::VALUE_REQUIRED, 'Orders items to create')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Generating data');

        $cats = $input->getOption('categories') ?: 0;
        $depth = $input->getOption('depth') ?: 0;
        $counts = [
            'categories'                 => $input->getOption('categories') ?: 0,
            'depth'                      => $input->getOption('depth') ?: 1,
            'categoriesToBeGenerated'    => (1 - $cats) !== 0
                ? (1 - pow($cats, $depth + 1)) / (1 - $cats) - 1
                : 0,
            'featuredProducts'           => $input->getOption('featuredProducts') ?: 0,
            'products'                   => $input->getOption('products') ?: 0,
            'attributes'                 => $input->getOption('attributes') ?: 0,
            'options'                    => $input->getOption('options') ?: 0,
            'optionsValues'              => $input->getOption('optionsValues') ?: 0,
            'productImages'              => $input->getOption('productImages') ?: 0,
            'wholesalePrices'            => $input->getOption('wholesalePrices') ?: 0,
            'orders'                     => $input->getOption('orders') ?: 0,
            'orderItems'                 => $input->getOption('orderItems') ?: 0,
            'categoryImage'              => $input->getOption('categoryImage') ?: 0,
        ];

        $io->section('Entities to generate (count)');
        $io->table([ 'name', 'value' ], array_map(null, array_keys($counts), array_values($counts)));

        if ($counts['categories']) {
            $io->section('Generating categories');
            $this->generateCategories($io, $input, $counts);
            $io->success('Categories generated');
        }

        if ($counts['products']) {
            $io->section('Generating products');
            $this->generateProducts($io, $input, $counts);
            $io->success('Products generated');
        }

        if ($counts['orders']) {
            $io->section('Generating orders');
            $this->generateOrders($io, $input, $counts);
            $io->success('Orders generated');
        }

        $io->success('Finished');
    }

    protected function generateCategories(SymfonyStyle $io, InputInterface $input, $counts)
    {
        $repo = \XLite\Core\Database::getRepo('XLite\Model\Category');

        if ($io->confirm('Clear categories?', false)) {
            $io->write('Removing all existing categories');

            $this->clearCategories();

            $io->writeln('[ OK ]');
        }

        $io->newLine();
        $io->write('<info>Generating categories</info>');

        $this->_generateCategories(
            $io,
            '0',
            $counts['categories'],
            $counts['depth'],
            $counts['categoryImage']
        );
        $io->newLine();
        $io->writeln('[ Generated ]');

        \XLite\Core\Database::getEM()->flush();
        \XLite\Core\Database::getEM()->clear();

        $io->newLine();
        $io->write('<info>Recalculating quick flags</info>');
        $repo->correctCategoriesStructure();
        $io->writeln('[ OK ]');

        \XLite\Core\Database::getEM()->clear();
    }

    protected function _generateCategories(SymfonyStyle $io, $suffix, $count, $maxDepth, $generateImage, \XLite\Model\Category $parent = null, $depth = 1)
    {
        if (!$parent) {
            $parent = \XLite\Core\Database::getRepo('XLite\Model\Category')->getRootCategory();
        }

        $commonProgress = $io->createProgressBar($count);

        $commonProgress->start();
        if ($depth === 1) {
            $io->newLine();
        }

        for ($i = 0; $i < $count; $i++) {
            $generator = new Category();
            $category = $generator->generate(
                $suffix . '_' . $i,
                $i,
                $parent,
                $generateImage
            );

            if ($depth === 1) {
                $io->write("\033[1A");
            }
            $commonProgress->advance();

            if ($depth === 1) {
                $io->newLine();
            }

            if ($depth < $maxDepth) {
                $this->_generateCategories($io, $suffix . '_' . $i, $count, $maxDepth, $generateImage, $category, $depth + 1);
            }
        }

        $commonProgress->finish();
        $commonProgress->clear();
    }

    protected function generateProducts(SymfonyStyle $io, InputInterface $input, $counts)
    {
        if ($io->confirm('Remove all existing products?', false)) {
            $io->write('Removing all existing products');
            $this->clearProducts();
            $io->writeln('[ OK ]');
        }

        $categoriesCount = \XLite\Core\Database::getRepo('XLite\Model\Category')->count();
        $categories = \XLite\Core\Database::getRepo('XLite\Model\Category')->iterateAll();

        $io->newLine();
        $io->writeln('<info>Generating products ... </info>');
        $commonProgress = $io->createProgressBar(($categoriesCount - 1) * $counts['products']);

        $generator = new Product(
            $counts['attributes'],
            $counts['options'],
            $counts['optionsValues'],
            $counts['productImages'],
            $counts['wholesalePrices']
        );

        $productsGenerated = 0;
        $batchSize = 20;

        /** @var \XLite\Model\Category $category */
        foreach ($categories as $category) {
            $category = $category[0];
            $featuredInCategory = 0;

            for ($i = 0; $i < $counts['products']; $i++) {
                $product = $generator->generate($category, 'P' .$i);

                if (\XLite\Core\Operator::isClassExists('XLite\Module\CDev\FeaturedProducts\Model\FeaturedProduct')) {
                    while ($featuredInCategory < $counts['featuredProducts']) {
                        $this->createFeaturedProduct($category, $product, $i);

                        $featuredInCategory++;
                    }
                }

                $commonProgress->advance();
                
                if ($productsGenerated % $batchSize === 0) {
                    \XLite\Core\Database::getEM()->flush();
                    \XLite\Core\Database::getEM()->clear();
                    $category = \XLite\Core\Database::getEM()->merge($category);
                }
                $productsGenerated++;
            }
        }

        $commonProgress->finish();
        $io->newLine(2);

        \XLite\Core\Database::getEM()->flush();
        \XLite\Core\Database::getEM()->clear();

        $io->newLine();
        $io->writeln('<info>Recalculating quick data ... </info>');
        $this->recalculateProductsQuickData($io);
        $io->writeln('[ OK ]');
    }

    protected function clearProducts()
    {
        \XLite\Core\Database::getRepo('XLite\Model\Product')->createPureQueryBuilder()
            ->delete('XLite\Model\Product', 'p')
            ->execute();

        \XLite\Core\Database::getEM()->flush();
        \XLite\Core\Database::getEM()->clear();
    }

    protected function clearCategories()
    {
        \XLite\Core\Database::getRepo('XLite\Model\Category')->createPureQueryBuilder()
            ->delete('XLite\Model\Category', 'c')
            ->where('c.category_id != :rootCategory')
            ->setParameter('rootCategory', \XLite\Core\Database::getRepo('XLite\Model\Category')->getRootCategoryId())
            ->execute();

        \XLite\Core\Database::getEM()->flush();
        \XLite\Core\Database::getEM()->clear();
    }

    protected function recalculateProductsQuickData(SymfonyStyle $io)
    {
        $quickData = \XLite\Core\QuickData::getInstance();
        $progress = $io->createProgressBar($quickData->countUnprocessed());
        $progress->display();

        do {
            $processed = $quickData->updateUnprocessedChunk(\XLite\Core\QuickData::CHUNK_LENGTH);
            if (0 < $processed) {
                \XLite\Core\Database::getEM()->clear();
            }
            $progress->advance($processed);

        } while (0 < $processed);
        $progress->finish();
    }

    /**
     * @param $category
     * @param $product
     * @param $i
     *
     * @return \XLite\Module\CDev\FeaturedProducts\Model\FeaturedProduct
     */
    protected function createFeaturedProduct($category, $product, $i)
    {
        return \XLite\Core\Database::getRepo('XLite\Module\CDev\FeaturedProducts\Model\FeaturedProduct')->insert(
            array(
                'product'  => $product,
                'category' => $category,
                'orderBy'  => $i,
            ),
            false
        );
    }

    protected function generateOrders(SymfonyStyle $io, InputInterface $input, $counts)
    {
        $repo = \XLite\Core\Database::getRepo('XLite\Model\Order');

        if ($io->confirm('Remove all existing orders?', false)) {
            $io->write('Removing all existing orders');
            $this->clearOrders();
            $io->writeln('[ OK ]');
        }

        /** @var \XLite\Model\Profile $profile */
        $profile = \XLite\Core\Database::getRepo('XLite\Model\Profile')->createQueryBuilder()
            ->bindRegistered()
            ->getSingleResult();

        /** @var \XLite\Model\Currency $currency */
        $currency = \XLite\Core\Database::getRepo('XLite\Model\Currency')->findOneByCode('USD');
        /** @var \XLite\Model\Payment\Method $method */
        $method = \XLite\Core\Database::getRepo('XLite\Model\Payment\Method')->findOneBy(['service_name' => 'PhoneOrdering']);

        $generator = new Order();
        $count = $counts['orders'];
        $itemsCount = $counts['orderItems'];
        $batchSize = 5;

        $commonProgress = $io->createProgressBar($count);

        for ($i = 0; $i < $count; $i++) {

            if (!\XLite\Core\Database::getEM()->contains($profile)) {
                $profile = \XLite\Core\Database::getRepo('XLite\Model\Profile')->find($profile->getProfileId());
                $currency =  \XLite\Core\Database::getRepo('XLite\Model\Currency')->find($currency->getCurrencyId());
            }

            $order = $generator->generate($profile, $currency, $method, $itemsCount);

            if ($i % $batchSize == 0) {
                \XLite\Core\Database::getEM()->flush();
                \XLite\Core\Database::getEM()->clear();
            }
            $commonProgress->advance();
        }
        $commonProgress->finish();
        $io->newLine(2);
        \XLite\Core\Database::getEM()->flush();

        $io->write('Updating sales...');
        $this->updateSales();
        $io->write('[ OK ]');

        \XLite\Core\Database::getEM()->clear();
    }

    protected function clearOrders()
    {
        \XLite\Core\Database::getRepo('XLite\Model\Order')->createPureQueryBuilder()
            ->delete('XLite\Model\Order', 'o')
            ->execute();

        \XLite\Core\Database::getEM()->flush();
        \XLite\Core\Database::getEM()->clear();
    }

    protected function updateSales()
    {
        $em = \XLite\Core\Database::getEM();
        $batchSize = 20;
        $i = 0;
        $q = $em->createQuery('select p from XLite\Model\Product p');
        $iterableResult = $q->iterate();
        foreach ($iterableResult as $row) {
            /** @var \Xlite\Model\Product $product */
            $product = $row[0];
            $product->updateSales();
            if (($i % $batchSize) === 0) {
                $em->flush(); // Executes all updates.
                $em->clear(); // Detaches all objects from Doctrine!
            }
            ++$i;
        }
        $em->flush();
    }
}
