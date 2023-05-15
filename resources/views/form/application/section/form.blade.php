<section class="form-app-form">
    <div class="container">

        <form class="form row" id="form" action="{{ route('form.app.save') }}">
            @csrf

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="firstname" id="firstname" maxlength="128" required aria-label="Imię" value="">
                <div class="placeholder">Imię*</div>
                <div class="error error-firstname"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="text" name="lastname" id="lastname" maxlength="128" required aria-label="Nazwisko" value="">
                <div class="placeholder">Nazwisko*</div>
                <div class="error error-lastname"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="address" id="address" maxlength="255" required aria-label="Adres" value="">
                <div class="placeholder">Adres*</div>
                <div class="error error-address"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="text" name="city" id="city" maxlength="64" required aria-label="Miejscowość" value="">
                <div class="placeholder">Miejscowość*</div>
                <div class="error error-city"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="zip" id="zip" maxlength="6" required aria-label="Kod pocztowy" value="">
                <div class="placeholder">Kod pocztowy*</div>
                <div class="error error-zip"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <select class="input select empty" name="voivodeship" id="voivodeship" aria-label="Województwo" required>
                    <option selected></option>
                    @foreach($voivodeships as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="placeholder">Województwo*</div>
                <div class="error error-voivodeship"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="phone" id="phone" maxlength="32" required aria-label="Telefon" value="">
                <div class="placeholder">Telefon*</div>
                <div class="error error-phone"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="email" name="email" id="email" maxlength="255" required aria-label="Adres e-mail" value="">
                <div class="placeholder">Adres e-mail*</div>
                <div class="error error-email"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <select class="input select empty" name="product" id="product" aria-label="Zakupiony produkt" required>
                    <option selected></option>
                    @foreach($products as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="placeholder">Zakupiony produkt*</div>
                <div class="error error-product"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <select class="input select empty" name="shop" id="shop" aria-label="Rodzaj sklepu" required>
                    <option selected></option>
                    @foreach($shops as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="placeholder">Rodzaj sklepu*</div>
                <div class="error error-shop"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="buy_at" id="buy_at" aria-label="Data zakupu" required value="">
                <div class="placeholder">Data zakupu*</div>
                <div class="error error-buy_at"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="text" name="receipt_number" id="receipt_number" maxlength="128" required aria-label="Numer dowodu zakupu" value="">
                <div class="placeholder">Numer dowodu zakupu*</div>
                <div class="error error-receipt_number"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <select class="input select empty" name="free" id="free" aria-label="Gratis" required>
                    <option selected></option>
                    @foreach($freebies as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="placeholder">Gratis*</div>
                <div class="error error-free"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <select class="input select empty" name="where" id="where" aria-label="Skąd wiesz o promocji?" required>
                    <option selected></option>
                    @foreach($wheres as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="placeholder">Skąd wiesz o promocji?*</div>
                <div class="error error-where"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <div class="file-uploads field-uploads">
                    <div class="uploads uploads-receipt uploads-d-none">
                        <input type="file" name="img_receipt" id="img_receipt" required class="upload-file file"/>
                    </div>
                    <button class="button slide_from_bottom full-width bold file-button button-uploads text-uppercase" type="button">dodaj zdjęcie dowodu zakupu</button>
                </div>
                <div class="error error-img_receipt"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <div class="file-uploads field-uploads">
                    <div class="uploads uploads-ean uploads-d-none">
                        <input type="file" name="img_ean" id="img_ean" required class="upload-file file"/>
                    </div>
                    <button class="button slide_from_bottom full-width bold file-button button-uploads text-uppercase" type="button">dodaj zdjęcie wyciętego <br />kodu kreskowego ean</button>
                </div>
                <div class="error error-img_ean"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <input class="checkbox" type="checkbox" name="legal_1" id="legal_1" required>
                <label for="legal_1" class="label-checkbox">
                    <span>*Zapoznałe(a)m się z regulaminem, dostępnym na stronie {{ env('APP_DOMAIN') }} i wyrażam zgodę na wszystkie jego postanowienia.</span>
                </label>
                <div class="error error-legal_1"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <input class="checkbox" type="checkbox" name="legal_2" id="legal_2" required>
                <label for="legal_2" class="label-checkbox">*Zapoznałe(a)m się z Polityką prywatności, dostępną na stronie {{ env('APP_DOMAIN') }} (zawierająca informację o przetwarzaniu danych osobowych).</label>
                <div class="error error-legal_2"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <input class="checkbox" type="checkbox" name="legal_3" id="legal_3">
                <label for="legal_3" class="label-checkbox">Wyrażam zgodę na przesyłanie informacji handlowych dotyczących produktów Spectrum Brands (oferowanych pod markami Remington, Russell Hobbs oraz George Foreman) za pomocą środków komunikacji elektronicznej (w tym na podany przeze mnie adres e-mail) przez Spectrum Brands Poland sp. z o.o. z siedzibą w Warszawie. Oświadczam, że zostałam/em poinformowana/y, że zgoda jest dobrowolna, oraz że mogę ją wycofać w każdym czasie.</label>
                <div class="error error-legal_3"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <input class="checkbox" type="checkbox" name="legal_4" id="legal_4">
                <label for="legal_4" class="label-checkbox">Wyrażam zgodę na używanie telekomunikacyjnych urządzeń końcowych i automatycznych systemów wywołujących dla celów marketingu bezpośredniego dotyczącego produktów Spectrum Brands (oferowanych pod markami Remington, Russell Hobbs oraz George Foreman) przez Spectrum Brands Poland sp. z o.o. z siedzibą w Warszawie, za pomocą środków komunikacji elektronicznej (e-mail). Oświadczam, że zostałam/em poinformowana/y, że zgoda jest dobrowolna, oraz że mogę ją wycofać w każdym czasie.</label>
                <div class="error error-legal_4"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 text-center">
                <button class="button slide_from_bottom bold mx-auto submit" type="submit" value="WYŚLIJ">WYŚLIJ</button>
            </div>

        </form>
    </div>
</section>
