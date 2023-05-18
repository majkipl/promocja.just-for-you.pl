<section class="form-opinion-form">
    <div class="container">

        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="info">
                    <p class="bold">Do wypełnienia formularza będzie Ci potrzebny numer zgłoszenia.</p>
                    <p>Czym jest numer zgłoszenia? Jest to numer, który otrzymujesz mailowo w odpowiedzi na poprawnie
                        wypełniony <a href="#" class="link" title="formularz zgłoszeniowy w akcji JUST FOR YOU">formularz
                            zgłoszeniowy w akcji JUST FOR YOU.</a></p>
                </div>
            </div>
        </div>


        <form class="form row" id="form" action="{{ route('form.opinion.save') }}">
            @csrf

            <x-forms.input.text name="firstname" required="required" max="128" placeholder="Imię" class="offset-lg-1"/>
            <x-forms.input.text name="lastname" required="required" max="128" placeholder="Nazwisko"/>
            <x-forms.input.text name="email" required="required" max="255" placeholder="Adres e-mail" class="offset-lg-1"/>
            <x-forms.input.number name="just_for_you_id" required="required" placeholder="Nr zgłoszenia w akcji JUST FOR YOU"/>
            <x-forms.input.text name="url" required="required" max="255" placeholder="Link do opinii w sklepie internetowym" class="offset-lg-1" />
            <x-forms.select name="free" required="required" placeholder="Gratis" :items="$freebies"/>

            <x-forms.textarea name="content" required="required" max="2048" placeholder="Treść opinii*" class="offset-lg-1"></x-forms.textarea>

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
