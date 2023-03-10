
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


    CREATE TABLE categorie (
      id int(11) NOT NULL,
      nom text NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    INSERT INTO categorie (id, nom) VALUES
    (1, 'Épicerie'),
    (2, 'Boissons'),
    (3, 'Droguerie'),
    (4, 'Cosmétiques'),
    (5, 'Produits frais');

    CREATE TABLE produit (
      id int(11) NOT NULL,
      categorie int(11) NOT NULL,
      nom text NOT NULL,
      prix decimal(4,2) NOT NULL,
      poids int(11) NOT NULL,
      description text NOT NULL,
      detail text NOT NULL,
      lieu text NOT NULL,
      distance int(11) NOT NULL,
      latitude float(8,6) NOT NULL,
      longitude float(8,6) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ALTER TABLE produit ADD COLUMN image varchar(255);

    INSERT INTO produit (id, categorie, nom, prix, poids, description, detail, lieu, distance, latitude, longitude,image) VALUES
    (1, 1, 'Tablette de chocolat noir 74% aux amandes - Bio Équitable - Vrac', '43.50', 0, 'Ingrédients : Chocolat noir 74%*, amandes toastées*.<p>*Ingrédients issus de l’agriculture biologique <p>Ingrédients issus du commerce équitable<p>Allergènes : Amande<p>Traces possibles de lait, gluten, fruits à coque (noisettes, noix, noix de cajou), soja, sésame, œuf et arachide', 'VALEURS NUTRITIONNELLES MOYENNES POUR 100G<p>Energie 576 kcal - 2387 kJ<p>Matières grasses 45 g<p>(dont acides gras saturés 25 g)<p>Glucides 28 g<p>(dont sucres 24 g)<p>Fibres 14 g<p>Protéines 9,3 g<p>Sel 0,18 g', 'Santeny', 293, 48.725288, 2.572804,'base/Image/1.jpg'),
    (2, 1, 'Biscuits apéro Vegan - Curry Gingembre - Bio', '34.90', 0, 'Biscuits apéro 100% bio, clean label, gourmand et sains, riches en protéines végétales et pauvres en sel. A partir d\'une farine de pois cassés bio en provenance d\'Italie.<p>Farine de pois cassés* (15,5%), huile d\'olive*, huile de tournesol désodorisée*, farine de manioc*, fécule de manioc*, farine de coco*, gingembre* (2,5%), curry* (1,2%), sel gris de Guérande, psyllium*<p>*Ingrédients issus de l\'agriculture biologique.<p>Sans colorants, ni conservateurs, ni additifs<p>Allergènes : ce produit est fabriqué dans un atelier qui travaille les fruits à coque (amande, noisette, noix de cajou, noix de pécan)', 'Date de durabilité minimum : 12 mois<p>Énergie : 1707 kJ / 408 Kcal<p>Matières grasses : 26,4 g <p>Dont acides gras saturés : 3,4 g <p>Glucides : 36,4 g <p>Dont sucre : 0,71 g <p>Fibres alimentaires : 7,6 g <p>Protéines : 5,4 g <p>Sel : 1,01 g', 'Villeurbanne', 413, 45.771942, 4.890171,'base/Image/2.jpg'),
    (3, 1, 'Lor et nut lait noisette 220g', '7.00', 220, 'Pâte à tartiner Lor & Nut\'s <p>Ingrédients : Noisettes (32.5%), chocolat au lait* (22.85%), sucre (19.6%), huile de tournesol (15%), lait en poudre (4.8%), cacao* (4.8%), sel, fève de Tonka.<p>* Issu du commerce équitable<p>Peut contenir des traces de fruits à coques, lactose et protéines de lait.', 'Notre partenaire fournisseur : Lor & Nut’s<p>Tom et Walé, vos deux écureuils Nancéiens, sont allés ramasser les noisettes cachées l’automne dernier pour vous préparer cette délicieuse pâte à tartiner !<p>Faite avec amour, elle accompagnera vos petits déjeuners et vos goûter.', 'Nancy', 0, 48.692055, 6.184417,'base/Image/3.jpg'),
    (4, 2, 'Auxerrois 2018/19 AOC 75 Cl', '12.00', 750, 'Vin de Toul. Blanc.<p>Auxerrois du Toulois. <p>Sec, floral et fruité.<p>Accords mets et vins : à l’apéritif, fruits de mer, poissons grillés et viandes blanches…', 'Cépages : Auxerrois 100%<p>Terroir : Le raisin est issu des coteaux orientés Sud, protégés des vents dominants d’Ouest. Les sols argilo-calcaire d’âge jurassique sont très bien drainés. Le climat est semi-continental.<p>Vinification : Vendange manuelle, tri sur pied. Pressurage direct, Fermentation durant 12 jours autour de 17°C. Elevage en cuve pendant 4 mois et sur lies fines pendant 6 mois.', 'Lucey', 30, 48.721245, 5.838307,'base/Image/4.jpg'),
    (5, 2, 'Tisane \"Canopée\" Bio - vrac', '69.90', 0, 'Tisane bio aux épices et à l’hibiscus<p>Ingrédients : pomme*, bâtons de cannelle*, camomille*, cardamome*, clou de girofle*, écorces d\'orange*, fenouil*, feuilles de mûre*, gingembre*, hibiscus*, mélisse*, poivre noir*, racine de réglisse*, fleurs de houblon*, millepertuis*<p>*ingrédients issus de l\'agriculture biologique', 'Infusion chaude :<p>Grammage : 15 – 20 g/l<p>Temps d’infusion : 7 – 10 minutes<p>Température d’infusion : 100°<p>Thé glacé :<p>Dosage : 1 cuillère pour 1L d’eau<p>Temps d’infusion : 5h', 'Wiwersheim', 132, 48.640007, 7.606756,'base/Image/5.jpg'),
    (6, 2, 'Café grains Pérou Décaféiné Bio', '28.00', 0, 'Espèce : Arabica<p>Récolte : Mars à Septembre<p>Process : Lavé - décaféiné Swiss water', 'Un café fin et légèrement épicé. La région de Cajamarca se situe dans le nord-ouest du Pérou, la ville principale est Jaen.<p>Ce café est ensuite décaféiné à l\'eau par l\'entreprise canadienne Swiss Water. La décaféination à l’eau utilise le principe d’osmose par lequel deux solutions séparées par une membrane perméable vont équilibrer leurs concentrations en caféine, du milieu le moins concentré vers celui le plus concentré.', 'Pont à Mousson', 36, 48.903290, 6.054868,'base/Image/6.jpg'),
    (7, 3, 'Acide citrique anhydre concentré Bio', '5.10', 0, '100% acide citrique anhydre. Qualité alimentaire.<p>Fabrication issue de la fermentation de micro-organismes à partir de sources naturelles de sucre, il ne s\'agit donc pas d\'une synthèse chimique. ', '- Acide citrique anhydre, donc ne comportant pas d\'eau (à la différence de l\'acide citrique monohydraté qui contient 10 % d\'eau)<p>- Produit de qualité alimentaire, utilisable dans tous les domaines y compris la gastronomie ainsi que le nettoyage et le détartrage des contenants et des surfaces alimentaires.<p>- L\'acide citrique est un produit de plus en plus utilisé dans l\'entretien écologique et économique et pour bien d\'autres utilisations, en particulier pour ajuster le pH à la baisse pour vos préparations cosmétiques, préparer des boissons et des produits de bain effervescents (voir sur la partie droite de la page). Il est rapidement et totalement biodégradable.<p>Produit irritant (Xi) pour les yeux, la peau et les muqueuses. Protéger les yeux et les mains pendant le travail. En cas de contact occulaire, bien rincer à l’eau, consulter un médecin. Tenir hors de portée des enfants !<p>L\'acide citrique est un acide dit \"faible\", donc beaucoup moins dangereux que l\'acide chlorhydrique ou l\'acide sulfurique, mais il convient néanmoins de se protéger, surtout lorsque vous le diluez à fortes doses dans l\'eau<p>L\'acide citrique lorsqu\'il est stocké à l\'abri de la chaleur et de l\'humidité peut se conserver pendant des années, voire même presque indéfiniment car les micro-organismes ne peuvent pas s\'y développer. Il s\'agit d\'un acide faible, qu\'il ne faut pas mettre en contact avec une base (comme le bicarbonate par exemple), car dans ce cas il réagira en dégageant du C02 et de l\'eau, ainsi qu\'un citrate.', 'Chauny', 289, 49.615578, 3.219421,'base/Image/7.jpg'),
    (8, 3, 'Filtre à café lavable Bio', '5.90', 5, 'Filtre de marque Alterosac<p>Lin biologique certifié GOTS (matières biologiques), il est cultivé et tissé en France<p>Dimensions : 20 x 12 cm', 'Lavez le filtre à l’eau après chaque utilisation, il peut passer occasionnellement en machine à laver.<p>La durabilité du filtre est d’environ un an (pour une utilisation quotidienne). Vous pouvez ensuite le composter.', 'Annecy', 465, 45.899246, 6.129384,'base/Image/8.jpg'),
    (9, 3, 'Poudre Lave-Vaisselle au Vinaigre Blanc Bio', '12.20', 750, 'Ingrédients : acide citrique, cristaux de soude, percarbonate de soude, vinaigre blanc.<p>Sans phosphonates, sans agent de blanchiment chloré, sans EDTA.', 'Nettoie et dégraisse la vaisselle, fait briller sans laisser de trace.<p>Convient à tous les cycles de lavage dès 40°C<p>Facile à doser (1 à 2 cuillères par lavage)<p>Universelle, convient aussi aux eaux calcaires<p>Economique : environ 30 utilisations pour 750g, soit environ 2 mois à raison d’1 machine tous les 2 jours.<p>Il est recommandé d’utiliser environ une cuillère à soupe pour une machine normale et deux pour une machine plus sale (~ 25g par cuillère). Pour respecter au mieux l’environnement, il est recommandé de faire tourner votre lave-vaisselle seulement lorsqu’il est plein et de privilégier les cycles de lavage à basse température. Si besoin, vous pouvez également ajouter des sels régénérants écologiques. Vous n\'avez pas besoin de rajouter du liquide de rinçage, le vinaigre dans la poudre peut le remplacer.<p>Pensez à éliminer les restes de nourritures sur les assiettes et plats avant de les placer dans le lave-vaisselle. Ensuite, il suffit de prendre la quantité de poudre souhaitée et de la placer directement dans le lave-vaisselle, il n’est pas obligatoire de la mettre dans le compartiment prévu à cet effet.<p>Comme cette poudre est anhydre, c’est-à-dire qu’elle ne contient pas d’eau, elle se conserve très longtemps. Il est conseillé de maintenir la poudre hors de la portée des enfants et dans un pot hermétique, un pot en verre par exemple, afin de la protéger de l’humidité.', 'Les Pennes-Mirabeau', 699, 43.410271, 5.308922,'base/Image/9.jpg'),
    (10, 4, 'Dentifrice à la menthe en poudre au Siwak Bio - 45 g', '6.90', 45, 'Ingrédients : Argile Blanche, Siwak, Carbonate de Calcium, Cristaux de Menthe.<p>Composition INCI : Kaolin, Calcium Carbonate, Salvadora Persica Stem Powder, Menthol<p>Sans colorant, sans conservateur, sans parfum et sans fluor ajouté.<p>Le Siwak est une racine d\'arbuste (Salvadora persica) utilisée comme  brosse à dents et dentifrice naturels depuis au moins 2500 ans un peu partout en Asie.', 'Adapté aux gencives sensibles, élimine la mauvaise haleine et fortifie les gencives, prévient la plaque dentaire et aide à enlever le tartre.<p>Faiblement abrasif, ce dentifrice ne comporte pas de danger pour l\'email, la dentine ou le cément. Rend les dents plus brillantes et plus blanches.<p>Ne mousse pas et n\'est pas sucré.<p>Ne pas avaler, cette version mentholée ne convient pas aux femmes enceintes, allaitantes, aux enfants de moins de 7 ans.<p>Economique, 3 mois d\'utilisation pour 45g (à raison de 3 utilisations par jour).<p>Se conserve 6 mois.', 'Les Pennes-Mirabeau', 699, 43.410271, 5.308922,'base/Image/10.jpg'),
    (11, 4, 'Déodorant solide au beurre de cacao - 50 g', '9.70', 50, 'ingrédients : beurre de cacao, cire de carnauba, citrofol, poudre d’iris de Florence.<p>Composition INCI: Theobroma Cacao (Cocoa) Seed Butter, Copernicia Cerifera (Carnauba) Wax, Triethyl Citrate, Iris Florentina Root Extract.<p>Sans bicarbonate de soude, sans huile essentielle, sans alcool, sans sel d’aluminium, sans huile de palme.<p>Poids : 50g', 'Hydrate et ne pique pas la peau, convient aux peaux sensibles, aux femmes enceintes et allaitantes.<p>Testé sous contrôle dermatologique, non testé sur les animaux.<p>Économique, environ 2 mois pour 50g<p>Ne fond pas sous l\'effet de la chaleur', 'Les Pennes-Mirabeau', 699, 43.410271, 5.308922,'base/Image/11.jpg'),
    (12, 4, 'Shampooing solide \"P\'tit Mousse\" Enfants et femmes enceintes - 20 g', '4.20', 20, 'Ingrédients : Sodium coco-sulfate, Sodium cocoyl isethionate, Beer*, Cocos nucifera oil*, Persea gratissima oil*, chromium oxide green  <p>* issus de l\'agriculture biologique<p>Format individuel.', 'Ce shampooing ne comporte pas d\'huiles essentielles, de parfum ni de conservateurs. A base d\'huile de coco bio et d\'huile d\'avocat bio, il nourrit le cuir chevelu et prend soin des cheveux. <p>Toute la gamme de shampoing de So Authentic est à la bière bio de Lorraine qui apporte brillance et souplesse aux cheveux.<p>Ce petit galet permet de réaliser une vingtaine de lavages (peu varier selon la longueur des cheveux et de la quantité de mousse souhaitée).<p>Avec son système d\'accroche, en corde de sisal naturel, il pourra être accroché pour faciliter son séchage après utilisation.<p>Convient aux enfants de moins de 6 ans et aux femmes enceintes.', 'Leyr', 25, 48.802818, 6.264313,'base/Image/12.jpg'),
    (13, 5, 'Petit Alba Bio - 165 g', '10.70', 165, 'Noix de cajou crue BIO*, eau filtrée, sel non raffiné/non traité, cultures, ferments d’affinage.<p>*Infos allergènes : Noix de cajou.', 'Retirez le carton d’emballage avant de placer le Petit Alba au réfrigérateur (de préférence entre 2 et 4°C).<p>Le produit continuera de vieillir dans son papier d’affinage. Cette création vegan est élaborée avec des cultures et ferments. Produit sont garanti sans conservateurs, colorants, exhausteurs de goût. <p>L’affinage du Petit Alba continue même après le dépassement de sa DLUO. Il continuera de vieillir comme un vrai fromage. Son goût, son odeur, sa texture et son caractère changeront jour après jour. Pour obtenir un Petit Alba crémeux, le placer à température ambiante avant sa dégustation.', 'Sarralbe', 85, 48.999638, 7.029931,'base/Image/13.jpg'),
    (14, 5, 'Ronde des saisons \"Nature\"', '2.90', 100, 'Au lait de vaches nourries sans OGM.', 'Ingrédients : lait crue, ferments lactiques, présure, sel<p>Producteur :L\'étoile de la colline', 'Goviller', 32, 48.497536, 6.009661,'base/Image/14.jpg'),
    (15, 5, 'La Bonne Foi Bio', '15.97', 145, 'Noix de cajou*, infusion de champignons*, huile de coco*, miso de riz* (soja), vin* (sulfites), beurre de cacao*, agar*, épices*, huile essentielle de poivre noir*<p>*produits issus de l\'agriculture biologique<p>Infos allergènes : Noix de cajou, soja, sulfites', 'La Bonne Foi est une terrine 100% végétale & BIO, sans foie, ni gras. C’est la version vegan du foie gras traditionnel.<p>À conserver entre 0°C et 4°C<p>À consommer dans les 5 jours après ouverture<p>À servir très frais !', 'Sarralbe', 85, 48.999638, 7.029931,'base/Image/15.jpg');


    ALTER TABLE categorie
      ADD PRIMARY KEY (id);

    ALTER TABLE produit
      ADD PRIMARY KEY (id),
      ADD KEY categorie (categorie);


    ALTER TABLE categorie
      MODIFY id int(11) NOT NULL AUTO_INCREMENT;

    ALTER TABLE produit
      MODIFY id int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE user (
  status int(3) NOT NULL CHECK (status=0 /*admin*/ OR status =100/*utilisateur*/),
  email varchar(128) NOT NULL,
  password varchar(128) NOT NULL,
  nom varchar(128) NOT NULL,
  prenom varchar(128) NOT NULL,
  PRIMARY KEY (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE panier (
    email varchar(64) NOT NULL,
    idProduit int(11) NOT NULL,
    quantite int(11) NOT NULL,
    PRIMARY KEY (email, idProduit)
);

DROP TABLE IF EXISTS `panier`;

# USE ccd;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
