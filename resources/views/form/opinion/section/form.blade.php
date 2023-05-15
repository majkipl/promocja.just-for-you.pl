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

            <div class=" col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="firstname" id="firstname" maxlength="100" required
                       aria-label="Imię" value="">
                <div class="placeholder">Imię*</div>
                <div class="error error-firstname"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="text" name="lastname" id="lastname" maxlength="100" required
                       aria-label="Nazwisko" value="">
                <div class="placeholder">Nazwisko*</div>
                <div class="error error-lastname"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="email" id="email" maxlength="100" required
                       aria-label="Adres e-mail" value="">
                <div class="placeholder">Adres e-mail*</div>
                <div class="error error-email"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="number" name="just_for_you_id" id="just_for_you_id" maxlength="100" required
                       aria-label="Nr zgłoszenia w akcji JUST FOR YOU" value="">
                <div class="placeholder">Nr zgłoszenia w akcji JUST FOR YOU*</div>
                <div class="error error-just_for_you_id"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="url" id="url" maxlength="255" required
                       aria-label="Link do opinii w sklepie internetowym" value="">
                <div class="placeholder">Link do opinii w sklepie internetowym*</div>
                <div class="error error-url"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <select class="input select empty" name="free" aria-label="Gratis" required>
                    <option selected></option>
                    @foreach($freebies as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="placeholder">Gratis*</div>
                <div class="error error-free"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <textarea class="textarea" name="content" id="content" required></textarea>
                <div class="placeholder">Treść opinii*</div>
                <div class="error error-content"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <input class="checkbox" type="checkbox" name="legal_1" id="legal_1" required>
                <label for="legal_1" class="label-checkbox">*Zapoznałe(a)m się z regulaminem, dostępnym na stronie
                    {{ env('APP_DOMAIN') }} i wyrażam zgodę na wszystkie jego postanowienia.</label>
                <div class="error error-legal_1"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <input class="checkbox" type="checkbox" name="legal_2" id="legal_2" required>
                <label for="legal_2" class="label-checkbox">*Zapoznałe(a)m się z Polityką prywatności, dostępną na
                    stronie {{ env('APP_DOMAIN') }} (zawierająca informację o przetwarzaniu danych osobowych).</label>
                <div class="error error-legal_2"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <input class="checkbox" type="checkbox" name="legal_3" id="legal_3">
                <label for="legal_3" class="label-checkbox">Wyrażam zgodę na przesyłanie informacji handlowych
                    dotyczących produktów Spectrum Brands (oferowanych pod markami Remington, Russell Hobbs oraz George
                    Foreman)
                    za pomocą środków komunikacji elektronicznej (w tym na podany przeze mnie adres e-mail) przez
                    Spectrum
                    Brands Poland sp. z o.o. z siedzibą w Warszawie. Oświadczam, że zostałam/em poinformowana/y, że
                    zgoda jest
                    dobrowolna, oraz że mogę ją wycofać w każdym czasie.</label>
                <div class="error error-legal_3"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <input class="checkbox" type="checkbox" name="legal_4" id="legal_4">
                <label for="legal_4" class="label-checkbox">Wyrażam zgodę na używanie telekomunikacyjnych urządzeń
                    końcowych i automatycznych systemów wywołujących dla celów marketingu bezpośredniego dotyczącego
                    produktów
                    Spectrum Brands (oferowanych pod markami Remington, Russell Hobbs oraz George Foreman) przez
                    Spectrum Brands
                    Poland sp. z o.o. z siedzibą w Warszawie, za pomocą środków komunikacji elektronicznej (e-mail).
                    Oświadczam, że zostałam/em poinformowana/y, że zgoda jest dobrowolna, oraz że mogę ją wycofać w
                    każdym
                    czasie.</label>
                <div class="error error-legal_4"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 text-center">
                <button class="button slide_from_bottom bold mx-auto submit" type="submit" value="WYŚLIJ">WYŚLIJ
                </button>
            </div>

        </form>

    </div>
</section>
