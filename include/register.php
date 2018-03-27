<div id="logregform" class="col-md-8 ml-auto mr-auto">
    <h2 class="text-center title">Nieuw account aanmaken</h2>
    <form class="contact-form" action="register.php" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Voornaam</label>
                    <input type="text" name="firstname" required placeholder="Vul hier uw voornaam in." class="form-control" rows="1" id="exampleMessage">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Achternaam</label>
                    <input type="text" name="surname" required placeholder="Vul hier uw achternaam in." class="form-control" rows="1" id="exampleMessage">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Straatnaam</label>
                    <input type="text" name="adress" required placeholder="Vul hier uw straatnaam in." class="form-control" rows="1" id="exampleMessage">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Huisnummer</label>
                    <input type="number" name="housenumber" required placeholder="Vul hier uw huisnummer in." class="form-control" rows="1" id="exampleMessage">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Woonplaats</label>
                    <input type="text" name="place" required placeholder="Vul hier uw Woonplaats in." class="form-control" rows="1" id="exampleMessage">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Postcode</label>
                    <input type="text" name="zipcode" required placeholder="Vul hier uw postcode in." class="form-control" rows="1" id="exampleMessage">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">E-mail</label>
                    <input type="email" name="email" required placeholder="Vul hier uw e-mail in." class="form-control" rows="1" id="exampleMessage">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Wachtwoord <danger>is niet veilig</danger></label>
                    <input type="password" name="password" required placeholder="Vul hier uw wachtwoord in." class="form-control" rows="1" id="exampleMessage">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Telefoonnummer</label>
                    <input type="tel" name="phone" required placeholder="Vul hier uw telefoonnummer in." class="form-control" rows="1" id="exampleMessage">
                </div>
            </div>
        </div>



        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" name="newsletter" required type="checkbox" value="" checked="">

                <span class="form-check-sign">
                    <span class="check"></span>
                                                </span>
                Ik meld mij aan voor de nieuwsbrief.
            </label>
        </div>

        <div class="row">
            <div class="col-md-4 ml-auto mr-auto text-center">
                <input type="submit" class="btn btn-round btn-raised" value="Account aanmaken" style="margin-top: 15px;font-size: 1.2em; background: #0094FE;">
            </div>
        </div>
    </form>
</div>