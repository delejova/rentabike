# rentabike
Aplikácia na požičiavanie bicyklov pre zamestnancov.

Zamestnanec sa zaregistruje do aplikacie. Registraciu potvrdi odkazom zaslanym e-mailom. 
Prihlasi sa do aplikacie. Vyberie si miesto vyzdvihnutia a nasledne bicykel. Zarezervuje si ho na dany casovy usek.
Nasledne si ide bicykel vyzdvihnut o danom case na recepciu, kde mu recepcna potvrdi jeho vyzdvihnutie v aplikacii.
Jeho vratenie recepcna opäť zaznamena v aplikacii.   

Aplikacia ma aj rolu pre facility, ktory dokaze upravovat informacie o bicykloch a pridavat/odoberat ich.

Využitý MVC model, framework Nette:

model - práca s databázou (vyuzitie storovanych procedur v databaze),
presenters - funkcinalita aplikacie,
templates - frontend aplikacie.

Aplikácia má rôzne role: facility, receptionist a samotneho pouzivatela.

FacilityPresenter - pre oddelenie facility na edit bicyklov.

ReceptionistPresenter - recepcná, ktorá potvrdzuje vyzdvihnutie bicyklov na recepcii a ich vrátenie.

BookPresenter - na samotne bookovanie bicyklov na urcity cas.

SignPresenter - na prihlasenie a regsitraciu do aplikacie.

Validpresenter - na validaciu registracie - poslanie mailu a jeho potvrdenie.

ProfilPresenter - na uchovanie dat o pouzivatelovi.

PlacePresenter - na volbu budoby (firma mala viac miest na poziciavanie bicyklov).

ForgotPresenter - pri zabudnuti hesla sa posle mail na link na nastavenie noveho.
  