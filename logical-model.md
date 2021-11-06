## Popis logického modelu e-shopu Antiquea

Autori projektu: Gaža Ladislav, Hájek Miroslav

### Entity:

- **`User`** - údaje o registrovanom zákazníkovi (účte používateľa e-shopu). Po prvom prihlásení sú známe len atribúty `email` a `password`. Na jednu emailovú adresu je možné založiť jeden účet, heslo sa ukladá v zahešovanom tvare.  Vyplnením objednávky sú získané aj ďalšie údaje na účely automatického predvyplnenia objednávkového formulára pri ďalších nákupoch. 
- **`ShoppingCart`** - Nákupný košík sa ukladá prihláseným používateľom na dlhšie ako trvanie webovej relácie. Každý zákazník má k dispozícii práve jeden aktívny košík, teda kde je `is_bought` nepravda. Ostatné košíky slúžia na evidovanie e-shopom spracovaných objednávok. Košík obsahuje položky nábytku (produkty), ktorí zákazník zamýšľa kúpiť (`ShoppingItem`) alebo už kúpil a pridané služby spojené s objednávkou ako sú zvolený spôsob dopravy a spôsob platby. 
- **`ShoppingItem`** - je položkou nákupného košíka a sleduje počet kusov zakupovaného nábytku atribútom `quantity`, ktorý v súčte nikdy nesmie presiahnuť počet dostupného tovaru.
- **`Furniture`** - informácie o predávanom nábytku. Zahŕňa okrem iného názov produktu, popis, cenu, zľavu, rozmery , dostupné množstvo a rôzne kategórie podľa ktorých je možné jednoduchšie vyhľadať daný tovar. Dokážeme tiež zviditeľniť alebo odoberať tovar z verejnej ponuky obchodu (`in_offering`).
- **`ShoppingOption`** - detail možných pridaných služieb k objednávke spolu s viažúcimi sa fixnými cenami `price`. Typy služby ako možnosti platby a dopravy sú odlíšené atribútom `type`
- **`Category`** - Vlastnosti nábytku, ktoré nenavyšujú jeho cenu ale umožňujú jednoduchšiu kategorizáciu a vyhľadateľnosť. Zahŕňajú farby nábytku, materiály z ktorých je vyrobené a miestnosti, do ktorých sa primárne hodí.
- **`DeliveryPlace`** - Zákazník si môže nechať doručiť celý obsah nákupného košíka na jedno miesto, každé má svoj názov podľa lokality, kde sa nachádza.

