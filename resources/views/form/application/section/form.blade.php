<section class="form-app-form">
    <div class="container">

        <form class="form row" id="form" action="{{ route('form.app.save') }}">
            @csrf

            <x-forms.input.text name="firstname" required="required" max="128" placeholder="Imię" class="offset-lg-1"/>
            <x-forms.input.text name="lastname" required="required" max="128" placeholder="Nazwisko"/>
            <x-forms.input.text name="address" required="required" max="255" placeholder="Adres" class="offset-lg-1"/>
            <x-forms.input.text name="city" required="required" max="64" placeholder="Miejscowość"/>
            <x-forms.input.text name="zip" required="required" max="6" placeholder="Kod pocztowy" class="offset-lg-1"/>
            <x-forms.select name="voivodeship" required="required" placeholder="Województwo" :items="$voivodeships"/>
            <x-forms.input.text name="phone" required="required" max="32" placeholder="Telefon" class="offset-lg-1"/>
            <x-forms.input.text name="email" required="required" max="255" placeholder="Adres e-mail"/>
            <x-forms.select name="product" required="required" placeholder="Zakupiony produkt" :items="$products" class="offset-lg-1"/>
            <x-forms.select name="shop" required="required" placeholder="Rodzaj sklepu" :items="$shops"/>
            <x-forms.input.text name="buy_at" required="required" placeholder="Data zakupu" class="offset-lg-1"/>
            <x-forms.input.text name="receipt_number" required="required" placeholder="Numer dowodu zakupu"/>
            <x-forms.select name="free" required="required" placeholder="Gratis" :items="$freebies" class="offset-lg-1"/>
            <x-forms.select name="where" required="required" placeholder="Skąd wiesz o promocji?" :items="$wheres"/>

            <x-forms.input.file name="img_receipt" required="required" class="offset-lg-1">
                dodaj zdjęcie dowodu zakupu
            </x-forms.input.file>

            <x-forms.input.file name="img_ean" required="required">
                dodaj zdjęcie wyciętego <br/>kodu kreskowego ean
            </x-forms.input.file>

            <x-forms.input.checkbox name="legal_1" required="required">
                <span>*Zapoznałe(a)m się z regulaminem, dostępnym na stronie {{ env('APP_DOMAIN') }} i wyrażam zgodę
                    na wszystkie jego postanowienia.</span>
            </x-forms.input.checkbox>

            <x-forms.input.checkbox name="legal_2" required="required">
                <span>*Zapoznałe(a)m się z Polityką prywatności, dostępną na stronie {{ env('APP_DOMAIN') }}
                    (zawierająca informację o przetwarzaniu danych osobowych).</span>
            </x-forms.input.checkbox>

            <x-forms.input.checkbox name="legal_3">
                <span>Wyrażam zgodę na przesyłanie informacji handlowych dotyczących produktów Spectrum Brands
                    (oferowanych pod markami Remington, Russell Hobbs oraz George Foreman) za pomocą środków
                    komunikacji elektronicznej (w tym na podany przeze mnie adres e-mail) przez Spectrum Brands
                    Poland sp. z o.o. z siedzibą w Warszawie. Oświadczam, że zostałam/em poinformowana/y, że zgoda
                    jest dobrowolna, oraz że mogę ją wycofać w każdym czasie.</span>
            </x-forms.input.checkbox>

            <x-forms.input.checkbox name="legal_4">
                <span>Wyrażam zgodę na używanie telekomunikacyjnych urządzeń końcowych i automatycznych systemów
                    wywołujących dla celów marketingu bezpośredniego dotyczącego produktów Spectrum Brands
                    (oferowanych pod markami Remington, Russell Hobbs oraz George Foreman) przez Spectrum Brands
                    Poland sp. z o.o. z siedzibą w Warszawie, za pomocą środków komunikacji elektronicznej (e-mail).
                    Oświadczam, że zostałam/em poinformowana/y, że zgoda jest dobrowolna, oraz że mogę ją wycofać
                    w każdym czasie.</span>
            </x-forms.input.checkbox>

            <div class="col-12 col-lg-10 offset-lg-1 text-center">
                <button class="button slide_from_bottom bold mx-auto submit" type="submit" value="WYŚLIJ">WYŚLIJ
                </button>
            </div>

        </form>
    </div>
</section>
