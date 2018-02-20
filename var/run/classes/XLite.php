<?php

/**
 * Application singleton
 *
 * @Swg\Swagger (
 *     schemes={"http"},
 *     host="demostore.x-cart.com",
 *     basePath="/admin.php?target=RESTAPI&",
 *     produces={"application/json", "application/xml"},
 *     consumes={"application/json", "application/x-www-form-urlencoded"},
 *     @Swg\Info (
 *         version="5.3.3.3",
 *         title="X-Cart REST API",
 *         description="",
 *     ),
 *     @Swg\ExternalDocumentation (
 *         description="Find out more about X-Cart REST API",
 *         url="https://devs.x-cart.com/en/basics/rest_api_documentation.html"
 *     )
 * )
 *
 * @SWG\SecurityScheme(
 *   securityDefinition="api_key",
 *   type="apiKey",
 *   in="query",
 *   name="_key"
 * )
 *
 * TODO: to revise
 * TODO[SINGLETON]: lowest priority
 */
class XLite extends \XLite\Module\XC\Concierge\XLite {}