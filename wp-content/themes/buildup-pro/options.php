<?php      
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */ 

function optionsframework_option_name() {
	// Change this to use your theme slug
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'buildup-pro'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
*/

function optionsframework_options() {
	//array of all custom font types.
	$font_types = array( '' => '',
    'ABeeZee' => 'ABeeZee',
    'Abel' => 'Abel',
    'Abril Fatface' => 'Abril Fatface',
    'Aclonica' => 'Aclonica',
    'Acme' => 'Acme',
    'Actor' => 'Actor',
    'Adamina' => 'Adamina',
    'Advent Pro' => 'Advent Pro',
    'Aguafina Script' => 'Aguafina Script',
    'Akronim' => 'Akronim',
    'Aladin' => 'Aladin',
    'Aldrich' => 'Aldrich',
    'Alegreya' => 'Alegreya',
    'Alegreya Sans SC' => 'Alegreya Sans SC',
    'Alegreya SC' => 'Alegreya SC',
    'Alex Brush' => 'Alex Brush',
    'Alef' => 'Alef',
    'Alfa Slab One' => 'Alfa Slab One',
    'Alice' => 'Alice',
    'Alike' => 'Alike',
    'Alike Angular' => 'Alike Angular',
    'Allan' => 'Allan',
    'Allerta' => 'Allerta',
    'Allerta Stencil' => 'Allerta Stencil',
    'Allura' => 'Allura',
    'Almendra' => 'Almendra',
    'Almendra Display' => 'Almendra Display',
    'Almendra SC' => 'Almendra SC',
    'Amiri' => 'Amiri',
    'Amarante' => 'Amarante',
    'Amaranth' => 'Amaranth',
    'Amatic SC' => 'Amatic SC',
    'Amethysta' => 'Amethysta',
    'Amita' => 'Amita',
    'Anaheim' => 'Anaheim',
    'Andada' => 'Andada',
    'Andika' => 'Andika',
    'Annie Use Your Telescope' => 'Annie Use Your Telescope',
    'Anonymous Pro' => 'Anonymous Pro',
    'Antic' => 'Antic',
    'Antic Didone' => 'Antic Didone',
    'Antic Slab' => 'Antic Slab',
    'Anton' => 'Anton',
    'Angkor' => 'Angkor',
    'Arapey' => 'Arapey',
    'Arbutus' => 'Arbutus',
    'Arbutus Slab' => 'Arbutus Slab',
    'Architects Daughter' => 'Architects Daughter',
    'Archivo White' => 'Archivo White',
    'Archivo Narrow' => 'Archivo Narrow',
    'Arial' => 'Arial',
    'Arimo' => 'Arimo',
    'Arya' => 'Arya',
    'Arizonia' => 'Arizonia',
    'Armata' => 'Armata',
    'Artifika' => 'Artifika',
    'Arvo' => 'Arvo',
    'Asar' => 'Asar',
    'Asap' => 'Asap',
    'Asset' => 'Asset',
    'Astloch' => 'Astloch',
    'Asul' => 'Asul',
    'Atomic Age' => 'Atomic Age',
    'Aubrey' => 'Aubrey',
    'Audiowide' => 'Audiowide',
    'Autour One' => 'Autour One',
    'Average' => 'Average',
    'Average Sans' => 'Average Sans',
    'Averia Gruesa Libre' => 'Averia Gruesa Libre',
    'Averia Libre' => 'Averia Libre',
    'Averia Sans Libre' => 'Averia Sans Libre',
    'Averia Serif Libre' => 'Averia Serif Libre',
    'Battambang' => 'Battambang',
    'Bad Script' => 'Bad Script',
    'Bayon' => 'Bayon',
    'Balthazar' => 'Balthazar',
    'Bangers' => 'Bangers',
    'Basic' => 'Basic',
    'Baumans' => 'Baumans',
    'Belgrano' => 'Belgrano',
    'Belleza' => 'Belleza',
    'BenchNine' => 'BenchNine',
    'Bentham' => 'Bentham',
    'Berkshire Swash' => 'Berkshire Swash',
    'Bevan' => 'Bevan',
    'Bigelow Rules' => 'Bigelow Rules',
    'Bigshot One' => 'Bigshot One',
    'Bilbo' => 'Bilbo',
    'Bilbo Swash Caps' => 'Bilbo Swash Caps',
    'Biryani' => 'Biryani',
    'Bitter' => 'Bitter',
    'White Ops One' => 'White Ops One',
    'Bokor' => 'Bokor',
    'Bonbon' => 'Bonbon',
    'Boogaloo' => 'Boogaloo',
    'Bowlby One' => 'Bowlby One',
    'Bowlby One SC' => 'Bowlby One SC',
    'Brawler' => 'Brawler',
    'Bree Serif' => 'Bree Serif',
    'Bubblegum Sans' => 'Bubblegum Sans',
    'Bubbler One' => 'Bubbler One',
    'Buda' => 'Buda',
    'Buenard' => 'Buenard',
    'Butcherman' => 'Butcherman',
    'Butcherman Caps' => 'Butcherman Caps',
    'Butterfly Kids' => 'Butterfly Kids',
    'Cabin' => 'Cabin',
    'Cabin Condensed' => 'Cabin Condensed',
    'Cabin Sketch' => 'Cabin Sketch',
    'Cabin' => 'Cabin',
    'Caesar Dressing' => 'Caesar Dressing',
    'Cagliostro' => 'Cagliostro',
    'Calligraffitti' => 'Calligraffitti',
    'Cambay' => 'Cambay',
    'Cambo' => 'Cambo',
    'Candal' => 'Candal',
    'Cantarell' => 'Cantarell',
    'Cantata One' => 'Cantata One',
    'Cantora One' => 'Cantora One',
    'Capriola' => 'Capriola',
    'Cardo' => 'Cardo',
    'Carme' => 'Carme',
    'Carrois Gothic' => 'Carrois Gothic',
    'Carrois Gothic SC' => 'Carrois Gothic SC',
    'Carter One' => 'Carter One',
    'Caveat' => 'Caveat',
    'Caveat Brush' => 'Caveat Brush',
    'Catamaran' => 'Catamaran',
    'Caudex' => 'Caudex',
    'Cedarville Cursive' => 'Cedarville Cursive',
    'Ceviche One' => 'Ceviche One',
    'Changa One' => 'Changa One',
    'Chango' => 'Chango',
    'Chau Philomene One' => 'Chau Philomene One',
    'Chenla' => 'Chenla',
    'Chela One' => 'Chela One',
    'Chelsea Market' => 'Chelsea Market',
    'Cherry Cream Soda' => 'Cherry Cream Soda',
    'Cherry Swash' => 'Cherry Swash',
    'Chewy' => 'Chewy',
    'Chicle' => 'Chicle',
    'Chivo' => 'Chivo',
    'Chonburi' => 'Chonburi',
    'Cinzel' => 'Cinzel',
    'Cinzel Decorative' => 'Cinzel Decorative',
    'Clicker Script' => 'Clicker Script',
    'Coda' => 'Coda',
    'Codystar' => 'Codystar',
    'Combo' => 'Combo',
    'Comfortaa' => 'Comfortaa',
    'Coming Soon' => 'Coming Soon',
    'Condiment' => 'Condiment',
    'Content' => 'Content',
    'Contrail One' => 'Contrail One',
    'Convergence' => 'Convergence',
    'Cookie' => 'Cookie',
    'Comic Sans MS' => 'Comic Sans MS',
    'Copse' => 'Copse',
    'Corben' => 'Corben',
    'Courgette' => 'Courgette',
    'Cousine' => 'Cousine',
    'Coustard' => 'Coustard',
    'Covered By Your Grace' => 'Covered By Your Grace',
    'Crafty Girls' => 'Crafty Girls',
    'Creepster' => 'Creepster',
    'Creepster Caps' => 'Creepster Caps',
    'Crete Round' => 'Crete Round',
    'Crimson' => 'Crimson',
    'Croissant One' => 'Croissant One',
    'Crushed' => 'Crushed',
    'Cuprum' => 'Cuprum',
    'Cutive' => 'Cutive',
    'Cutive Mono' => 'Cutive Mono',
    'Damion' => 'Damion',
    'Dangrek' => 'Dangrek',
    'Dancing Script' => 'Dancing Script',
    'Dawning of a New Day' => 'Dawning of a New Day',
    'Days One' => 'Days One',
    'Dekko' => 'Dekko',
    'Delius' => 'Delius',
    'Delius Swash Caps' => 'Delius Swash Caps',
    'Delius Unicase' => 'Delius Unicase',
    'Della Respira' => 'Della Respira',
    'Denk One' => 'Denk One',
    'Devonshire' => 'Devonshire',
    'Dhurjati' => 'Dhurjati',
    'Didact Gothic' => 'Didact Gothic',
    'Diplomata' => 'Diplomata',
    'Diplomata SC' => 'Diplomata SC',
    'Domine' => 'Domine',
    'Donegal One' => 'Donegal One',
    'Doppio One' => 'Doppio One',
    'Dorsa' => 'Dorsa',
    'Dosis' => 'Dosis',
    'Dr Sugiyama' => 'Dr Sugiyama',
    'Droid Sans' => 'Droid Sans',
    'Droid Sans Mono' => 'Droid Sans Mono',
    'Droid Serif' => 'Droid Serif',
    'Duru Sans' => 'Duru Sans',
    'Dynalight' => 'Dynalight',
    'EB Garamond' => 'EB Garamond',
    'Eczar' => 'Eczar',
    'Eagle Lake' => 'Eagle Lake',
    'Eater' => 'Eater',
    'Eater Caps' => 'Eater Caps',
    'Economica' => 'Economica',
    'Ek Mukta' => 'Ek Mukta',
    'Electrolize' => 'Electrolize',
    'Elsie' => 'Elsie',
    'Elsie Swash Caps' => 'Elsie Swash Caps',
    'Emblema One' => 'Emblema One',
    'Emilys Candy' => 'Emilys Candy',
    'Engagement' => 'Engagement',
    'Englebert' => 'Englebert',
    'Enriqueta' => 'Enriqueta',
    'Erica One' => 'Erica One',
    'Esteban' => 'Esteban',
    'Euphoria Script' => 'Euphoria Script',
    'Ewert' => 'Ewert',
    'Exo' => 'Exo',
    'Exo 2' => 'Exo 2',
    'Expletus Sans' => 'Expletus Sans',
    'Fanwood Text' => 'Fanwood Text',
    'Fascinate' => 'Fascinate',
    'Fascinate Inline' => 'Fascinate Inline',
    'Fasthand' => 'Fasthand',
    'Faster One' => 'Faster One',
    'Federant' => 'Federant',
    'Federo' => 'Federo',
    'Felipa' => 'Felipa',
    'Fenix' => 'Fenix',
    'Finger Paint' => 'Finger Paint',
    'Fira Mono' => 'Fira Mono',
    'Fira Sans' => 'Fira Sans',
    'Fjalla One' => 'Fjalla One',
    'Fjord One' => 'Fjord One',
    'Flamenco' => 'Flamenco',
    'Flavors' => 'Flavors',
    'Fondamento' => 'Fondamento',
    'Fontdiner Swanky' => 'Fontdiner Swanky',
    'Forum' => 'Forum',
    'Francois One' => 'Francois One',
    'FreeSans' => 'FreeSans',

    'Freckle Face' => 'Freckle Face',
    'Fredericka the Great' => 'Fredericka the Great',
    'Fredoka One' => 'Fredoka One',
    'Fresca' => 'Fresca',
    'Freehand' => 'Freehand',
    'Frijole' => 'Frijole',
    'Fruktur' => 'Fruktur',
    'Fugaz One' => 'Fugaz One',
    'Gafata' => 'Gafata',
    'Galdeano' => 'Galdeano',
    'Galindo' => 'Galindo',
    'Gentium Basic' => 'Gentium Basic',
    'Gentium Book Basic' => 'Gentium Book Basic',
    'Geo' => 'Geo',
    'Georgia' => 'Georgia',
    'Geostar' => 'Geostar',
    'Geostar Fill' => 'Geostar Fill',
    'Germania One' => 'Germania One',
    'Gilda Display' => 'Gilda Display',
    'Give You Glory' => 'Give You Glory',
    'Glass Antiqua' => 'Glass Antiqua',
    'Glegoo' => 'Glegoo',
    'Gloria Hallelujah' => 'Gloria Hallelujah',
    'Goblin One' => 'Goblin One',
    'Gochi Hand' => 'Gochi Hand',
    'Gorditas' => 'Gorditas',
    'Gurajada' => 'Gurajada',
    'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
    'Graduate' => 'Graduate',
    'Grand Hotel' => 'Grand Hotel',
    'Gravitas One' => 'Gravitas One',
    'Great Vibes' => 'Great Vibes',
    'Griffy' => 'Griffy',
    'Gruppo' => 'Gruppo',
    'Gudea' => 'Gudea',
    'Gidugu' => 'Gidugu',
    'GFS Didot' => 'GFS Didot',
    'GFS Neohellenic' => 'GFS Neohellenic',
    'Habibi' => 'Habibi',
    'Hammersmith One' => 'Hammersmith One',
    'Halant' => 'Halant',
    'Hanalei' => 'Hanalei',
    'Hanalei Fill' => 'Hanalei Fill',
    'Handlee' => 'Handlee',
    'Hanuman' => 'Hanuman',
    'Happy Monkey' => 'Happy Monkey',
    'Headland One' => 'Headland One',
    'Henny Penny' => 'Henny Penny',
    'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
    'Hind' => 'Hind',
    'Hind Siliguri' => 'Hind Siliguri',
    'Hind Vadodara' => 'Hind Vadodara',
    'Holtwood One SC' => 'Holtwood One SC',
    'Homemade Apple' => 'Homemade Apple',
    'Homenaje' => 'Homenaje',
    'IM Fell' => 'IM Fell',
    'Itim' => 'Itim',
    'Iceberg' => 'Iceberg',
    'Iceland' => 'Iceland',
    'Imprima' => 'Imprima',
    'Inconsolata' => 'Inconsolata',
    'Inder' => 'Inder',
    'Indie Flower' => 'Indie Flower',
    'Inknut Antiqua' => 'Inknut Antiqua',
    'Inika' => 'Inika',
    'Irish Growler' => 'Irish Growler',
    'Istok Web' => 'Istok Web',
    'Italiana' => 'Italiana',
    'Italianno' => 'Italianno',
    'Jacques Francois' => 'Jacques Francois',
    'Jacques Francois Shadow' => 'Jacques Francois Shadow',
    'Jim Nightshade' => 'Jim Nightshade',
    'Jockey One' => 'Jockey One',
    'Jaldi' => 'Jaldi',
    'Jolly Lodger' => 'Jolly Lodger',
    'Josefin Sans' => 'Josefin Sans',
    'Josefin Sans' => 'Josefin Sans',
    'Josefin Slab' => 'Josefin Slab',
    'Joti One' => 'Joti One',
    'Judson' => 'Judson',
    'Julee' => 'Julee',
    'Julius Sans One' => 'Julius Sans One',
    'Junge' => 'Junge',
    'Jura' => 'Jura',
    'Just Another Hand' => 'Just Another Hand',
    'Just Me Again Down Here' => 'Just Me Again Down Here',
    'Kadwa' => 'Kadwa',
    'Kdam Thmor' => 'Kdam Thmor',
    'Kalam' => 'Kalam', 
    'Kameron' => 'Kameron',
    'Kantumruy' => 'Kantumruy',
    'Karma' => 'Karma',
    'Karla' => 'Karla',
    'Kaushan Script' => 'Kaushan Script',
    'Kavoon' => 'Kavoon',
    'Keania One' => 'Keania One',
    'Kelly Slab' => 'Kelly Slab',
    'Kenia' => 'Kenia',
    'Khand' => 'Khand',
    'Khmer' => 'Khmer',
    'Khula' => 'Khula',
    'Kite One' => 'Kite One',
    'Knewave' => 'Knewave',
    'Kotta One' => 'Kotta One',
    'Kranky' => 'Kranky',
    'Kreon' => 'Kreon',
    'Kristi' => 'Kristi',
    'Koulen' => 'Koulen',
    'Krona One' => 'Krona One',
    'Kurale' => 'Kurale',
    'Lakki Reddy' => 'Lakki Reddy',
    'La Belle Aurore' => 'La Belle Aurore',
    'Lancelot' => 'Lancelot',
    'Laila' => 'Laila',
    'Lato' => 'Lato',
    'Lateef' => 'Lateef',
    'League Script' => 'League Script',
    'Leckerli One' => 'Leckerli One',
    'Ledger' => 'Ledger',
    'Lekton' => 'Lekton',
    'Lemon' => 'Lemon',

    'Libre Baskerville' => 'Libre Baskerville',
    'Life Savers' => 'Life Savers',
    'Lilita One' => 'Lilita One',
    'Limelight' => 'Limelight',
    'Linden Hill' => 'Linden Hill',
    'Lobster' => 'Lobster',
    'Lobster Two' => 'Lobster Two',
    'Londrina Outline' => 'Londrina Outline',
    'Londrina Shadow' => 'Londrina Shadow',
    'Londrina Sketch' => 'Londrina Sketch',
    'Londrina Solid' => 'Londrina Solid',
    'Lora' => 'Lora',
    'Love Ya Like A Sister' => 'Love Ya Like A Sister',
    'Loved by the King' => 'Loved by the King',
    'Lovers Quarrel' => 'Lovers Quarrel',
    'Lucida Sans Unicode' => 'Lucida Sans Unicode',
    'Luckiest Guy' => 'Luckiest Guy',
    'Lusitana' => 'Lusitana',
    'Lustria' => 'Lustria',
    'Macondo' => 'Macondo',
    'Macondo Swash Caps' => 'Macondo Swash Caps',
    'Magra' => 'Magra',
    'Maiden Orange' => 'Maiden Orange',
    'Mallanna' => 'Mallanna',
    'Mandali' => 'Mandali',
    'Mako' => 'Mako',
    'Marcellus' => 'Marcellus',
    'Marcellus SC' => 'Marcellus SC',
    'Marck Script' => 'Marck Script',
    'Margarine' => 'Margarine',
    'Marko One' => 'Marko One',
    'Marmelad' => 'Marmelad',
    'Marvel' => 'Marvel',
    'Martel' => 'Martel',
    'Martel Sans' => 'Martel Sans',
    'Mate' => 'Mate',
    'Mate SC' => 'Mate SC',
    'Maven Pro' => 'Maven Pro',
    'McLaren' => 'McLaren',
    'Meddon' => 'Meddon',
    'MedievalSharp' => 'MedievalSharp',
    'Medula One' => 'Medula One',
    'Megrim' => 'Megrim',
    'Meie Script' => 'Meie Script',
    'Merienda' => 'Merienda',
    'Merienda One' => 'Merienda One',
    'Merriweather' => 'Merriweather',
    'Metal' => 'Metal',
    'Metal Mania' => 'Metal Mania',
    'Metamorphous' => 'Metamorphous',
    'Metrophobic' => 'Metrophobic',
    'Michroma' => 'Michroma',
    'Milonga' => 'Milonga',
    'Miltonian' => 'Miltonian',
    'Miltonian Tattoo' => 'Miltonian Tattoo',
    'Miniver' => 'Miniver',
    'Miss Fajardose' => 'Miss Fajardose',
    'Miss Saint Delafield' => 'Miss Saint Delafield',
    'Modak' => 'Modak',
    'Modern Antiqua' => 'Modern Antiqua',
    'Molengo' => 'Molengo',
    'Molle' => 'Molle',
    'Moulpali' => 'Moulpali',
    'Monda' => 'Monda',
    'Monofett' => 'Monofett',
    'Monoton' => 'Monoton',
    'Monsieur La Doulaise' => 'Monsieur La Doulaise',
    'Montaga' => 'Montaga',
    'Montez' => 'Montez',
    'Montserrat' => 'Montserrat',
    'Montserrat Alternates' => 'Montserrat Alternates',
    'Montserrat Subrayada' => 'Montserrat Subrayada',
    'Mountains of Christmas' => 'Mountains of Christmas',
    'Mouse Memoirs' => 'Mouse Memoirs',
    'Moul' => 'Moul',
    'Mr Bedford' => 'Mr Bedford',
    'Mr Bedfort' => 'Mr Bedfort',
    'Mr Dafoe' => 'Mr Dafoe',
    'Mr De Haviland' => 'Mr De Haviland',
    'Mrs Saint Delafield' => 'Mrs Saint Delafield',
    'Mrs Sheppards' => 'Mrs Sheppards',
    'Muli' => 'Muli',
    'Mystery Quest' => 'Mystery Quest',
    'Neucha' => 'Neucha',
    'Neuton' => 'Neuton',
    'New Rocker' => 'New Rocker',
    'News Cycle' => 'News Cycle',
    'Niconne' => 'Niconne',
    'Nixie One' => 'Nixie One',
    'Nobile' => 'Nobile',
    'Nokora' => 'Nokora',
    'Norican' => 'Norican',
    'Nosifer' => 'Nosifer',
    'Nosifer Caps' => 'Nosifer Caps',
    'Nova Mono' => 'Nova Mono',
    'Noticia Text' => 'Noticia Text',
    'Noto Sans' => 'Noto Sans',
    'Noto Serif' => 'Noto Serif',
    'Nova Round' => 'Nova Round',
    'Numans' => 'Numans',
    'Nunito' => 'Nunito',
    'NTR' => 'NTR',
    'Offside' => 'Offside',
    'Oldenburg' => 'Oldenburg',
    'Oleo Script' => 'Oleo Script',
    'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
    'Open Sans' => 'Open Sans',
    'Open Sans Condensed' => 'Open Sans Condensed',
    'Oranienbaum' => 'Oranienbaum',
    'Orbitron' => 'Orbitron',
    'Odor Mean Chey' => 'Odor Mean Chey',
    'Oregano' => 'Oregano',
    'Orienta' => 'Orienta',
    'Original Surfer' => 'Original Surfer',
    'Oswald' => 'Oswald',
    'Over the Rainbow' => 'Over the Rainbow',
    'Overlock' => 'Overlock',
    'Overlock SC' => 'Overlock SC',
    'Ovo' => 'Ovo',
    'Oxygen' => 'Oxygen',
    'Oxygen Mono' => 'Oxygen Mono',
    'Palanquin Dark' => 'Palanquin Dark',
    'Peddana' => 'Peddana',
    'Poppins' => 'Poppins',
    'PT Mono' => 'PT Mono',
    'PT Sans' => 'PT Sans',
    'PT Sans Caption' => 'PT Sans Caption',
    'PT Sans Narrow' => 'PT Sans Narrow',
    'PT Serif' => 'PT Serif',
    'PT Serif Caption' => 'PT Serif Caption',
    'Pacifico' => 'Pacifico',
    'Paprika' => 'Paprika',
    'Parisienne' => 'Parisienne',
    'Passero One' => 'Passero One',
    'Passion One' => 'Passion One',
    'Patrick Hand' => 'Patrick Hand',
    'Patrick Hand SC' => 'Patrick Hand SC',
    'Patua One' => 'Patua One',
    'Paytone One' => 'Paytone One',
    'Peralta' => 'Peralta',
    'Permanent Marker' => 'Permanent Marker',
    'Petit Formal Script' => 'Petit Formal Script',
    'Petrona' => 'Petrona',
    'Philosopher' => 'Philosopher',
    'Piedra' => 'Piedra',
    'Pinyon Script' => 'Pinyon Script',
    'Pirata One' => 'Pirata One',
    'Plaster' => 'Plaster',
    'Palatino Linotype' => 'Palatino Linotype',
    'Play' => 'Play',
    'Playball' => 'Playball',
    'Playfair Display' => 'Playfair Display',
    'Playfair Display SC' => 'Playfair Display SC',
    'Podkova' => 'Podkova',
    'Poiret One' => 'Poiret One',
    'Poller One' => 'Poller One',
    'Poly' => 'Poly',
    'Pompiere' => 'Pompiere',
    'Pontano Sans' => 'Pontano Sans',
    'Port Lligat Sans' => 'Port Lligat Sans',
    'Port Lligat Slab' => 'Port Lligat Slab',
    'Prata' => 'Prata',
    'Pragati Narrow' => 'Pragati Narrow',
    'Preahvihear' => 'Preahvihear',
    'Press Start 2P' => 'Press Start 2P',
    'Princess Sofia' => 'Princess Sofia',
    'Prociono' => 'Prociono',
    'Prosto One' => 'Prosto One',
    'Puritan' => 'Puritan',
    'Purple Purse' => 'Purple Purse',
    'Quando' => 'Quando',
    'Quantico' => 'Quantico',
    'Quattrocento' => 'Quattrocento',
    'Quattrocento Sans' => 'Quattrocento Sans',
    'Questrial' => 'Questrial',
    'Quicksand' => 'Quicksand',
    'Quintessential' => 'Quintessential',
    'Qwigley' => 'Qwigley',
    'Racing Sans One' => 'Racing Sans One',
    'Radley' => 'Radley',
    'Rajdhani' => 'Rajdhani',
    'Raleway Dots' => 'Raleway Dots',
    'Raleway' => 'Raleway',
    'Rambla' => 'Rambla',
    'Ramabhadra' => 'Ramabhadra',
    'Ramaraja' => 'Ramaraja',
    'Rammetto One' => 'Rammetto One',
    'Ranchers' => 'Ranchers',
    'Rancho' => 'Rancho',
    'Ranga' => 'Ranga',
    'Ravi Prakash' => 'Ravi Prakash',
    'Rationale' => 'Rationale',
    'Redressed' => 'Redressed',
    'Reenie Beanie' => 'Reenie Beanie',
    'Revalia' => 'Revalia',
    'Rhodium Libre' => 'Rhodium Libre',
    'Ribeye' => 'Ribeye',
    'Ribeye Marrow' => 'Ribeye Marrow',
    'Righteous' => 'Righteous',
    'Risque' => 'Risque',
    'Roboto' => 'Roboto',
    'Roboto Condensed' => 'Roboto Condensed',
    'Roboto Mono' => 'Roboto Mono',
    'Roboto Slab' => 'Roboto Slab',
    'Rochester' => 'Rochester',
    'Rock Salt' => 'Rock Salt',
    'Rokkitt' => 'Rokkitt',
    'Romanesco' => 'Romanesco',
    'Ropa Sans' => 'Ropa Sans',
    'Rosario' => 'Rosario',
    'Rosarivo' => 'Rosarivo',
    'Rouge Script' => 'Rouge Script',
    'Rozha One' => 'Rozha One',
    'Rubik' => 'Rubik',
    'Rubik One' => 'Rubik One',
    'Rubik Mono One' => 'Rubik Mono One',
    'Ruda' => 'Ruda',
    'Rufina' => 'Rufina',
    'Ruge Boogie' => 'Ruge Boogie',
    'Ruluko' => 'Ruluko',
    'Rum Raisin' => 'Rum Raisin',
    'Ruslan Display' => 'Ruslan Display',
    'Russo One' => 'Russo One',
    'Ruthie' => 'Ruthie',
    'Rye' => 'Rye',
    'Sacramento' => 'Sacramento',
    'Sail' => 'Sail',
    'Salsa' => 'Salsa',
    'Sanchez' => 'Sanchez',
    'Sancreek' => 'Sancreek',
    'Sahitya' => 'Sahitya',
    'Sansita One' => 'Sansita One',
    'Sarpanch' => 'Sarpanch',
    'Sarina' => 'Sarina',
    'Satisfy' => 'Satisfy',
    'Scada' => 'Scada',
    'Scheherazade' => 'Scheherazade',
    'Schoolbell' => 'Schoolbell',
    'Seaweed Script' => 'Seaweed Script',
    'Sarala' => 'Sarala',
    'Sevillana' => 'Sevillana',
    'Seymour One' => 'Seymour One',
    'Shadows Into Light' => 'Shadows Into Light',
    'Shadows Into Light Two' => 'Shadows Into Light Two',
    'Shanti' => 'Shanti',
    'Share' => 'Share',
    'Share Tech' => 'Share Tech',
    'Share Tech Mono' => 'Share Tech Mono',
    'Shojumaru' => 'Shojumaru',
    'Short Stack' => 'Short Stack',
    'Sigmar One' => 'Sigmar One',
    'Suranna' => 'Suranna',
    'Suravaram' => 'Suravaram',
    'Suwannaphum' => 'Suwannaphum',
    'Signika' => 'Signika',
    'Signika Negative' => 'Signika Negative',
    'Simonetta' => 'Simonetta',
    'Siemreap' => 'Siemreap',
    'Sirin Stencil' => 'Sirin Stencil',
    'Six Caps' => 'Six Caps',
    'Skranji' => 'Skranji',
    'Slackey' => 'Slackey',
    'Smokum' => 'Smokum',
    'Smythe' => 'Smythe',
    'Sniglet' => 'Sniglet',
    'Snippet' => 'Snippet',
    'Snowburst One' => 'Snowburst One',
    'Sofadi One' => 'Sofadi One',
    'Sofia' => 'Sofia',
    'Sonsie One' => 'Sonsie One',
    'Sorts Mill Goudy' => 'Sorts Mill Goudy',
    'Sorts Mill Goudy' => 'Sorts Mill Goudy',
    'Source Code Pro' => 'Source Code Pro',
    'Source Sans Pro' => 'Source Sans Pro',
    'Special I am one' => 'Special I am one',
    'Spicy Rice' => 'Spicy Rice',
    'Spinnaker' => 'Spinnaker',
    'Spirax' => 'Spirax',
    'Squada One' => 'Squada One',
    'Sree Krushnadevaraya' => 'Sree Krushnadevaraya',
    'Stalemate' => 'Stalemate',
    'Stalinist One' => 'Stalinist One',
    'Stardos Stencil' => 'Stardos Stencil',
    'Stint Ultra Condensed' => 'Stint Ultra Condensed',
    'Stint Ultra Expanded' => 'Stint Ultra Expanded',
    'Stoke' => 'Stoke',
    'Stoke' => 'Stoke',
    'Strait' => 'Strait',
    'Sura' => 'Sura',
    'Sumana' => 'Sumana',
    'Sue Ellen Francisco' => 'Sue Ellen Francisco',
    'Sunshiney' => 'Sunshiney',
    'Supermercado One' => 'Supermercado One',
    'Swanky and Moo Moo' => 'Swanky and Moo Moo',
    'Syncopate' => 'Syncopate',
    'Symbol' => 'Symbol',
    'Timmana' => 'Timmana',
    'Taprom' => 'Taprom',
    'Tangerine' => 'Tangerine',
    'Tahoma' => 'Tahoma',
    'Teko' => 'Teko',
    'Telex' => 'Telex',
    'Tenali Ramakrishna' => 'Tenali Ramakrishna',
    'Tenor Sans' => 'Tenor Sans',
    'Terminal Dosis' => 'Terminal Dosis',
    'Terminal Dosis Light' => 'Terminal Dosis Light',
    'Text Me One' => 'Text Me One',
    'The Girl Next Door' => 'The Girl Next Door',
    'Tienne' => 'Tienne',
    'Tillana' => 'Tillana',
    'Tinos' => 'Tinos',
    'Titan One' => 'Titan One',
    'Titillium Web' => 'Titillium Web',
    'Trade Winds' => 'Trade Winds',
    'Trebuchet MS' => 'Trebuchet MS',
    'Trocchi' => 'Trocchi',
    'Trochut' => 'Trochut',
    'Trykker' => 'Trykker',
    'Tulpen One' => 'Tulpen One',
    'Ubuntu' => 'Ubuntu',
    'Ubuntu Condensed' => 'Ubuntu Condensed',
    'Ubuntu Mono' => 'Ubuntu Mono',
    'Ultra' => 'Ultra',
    'Uncial Antiqua' => 'Uncial Antiqua',
    'Underdog' => 'Underdog',
    'Unica One' => 'Unica One',
    'UnifrakturCook' => 'UnifrakturCook',
    'UnifrakturMaguntia' => 'UnifrakturMaguntia',
    'Unkempt' => 'Unkempt',
    'Unlock' => 'Unlock',
    'Unna' => 'Unna',
    'VT323' => 'VT323',
    'Vampiro One' => 'Vampiro One',
    'Varela' => 'Varela',
    'Varela Round' => 'Varela Round',
    'Vast Shadow' => 'Vast Shadow',
    'Vesper Libre' => 'Vesper Libre',
    'Verdana' => 'Verdana',
    'Vibur' => 'Vibur',
    'Vidaloka' => 'Vidaloka',
    'Viga' => 'Viga',
    'Voces' => 'Voces',
    'Volkhov' => 'Volkhov',
    'Vollkorn' => 'Vollkorn',
    'Voltaire' => 'Voltaire',
    'Waiting for the Sunrise' => 'Waiting for the Sunrise',
    'Wallpoet' => 'Wallpoet',
    'Walter Turncoat' => 'Walter Turncoat',
    'Warnes' => 'Warnes',
    'Wellfleet' => 'Wellfleet',
    'Wendy One' => 'Wendy One',
    'Wire One' => 'Wire One',
    'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    'Yantramanav' => 'Yantramanav',
    'Yellowtail' => 'Yellowtail',
    'Yeseva One' => 'Yeseva One',
    'Yesteryear' => 'Yesteryear',
    'Zeyada' => 'Zeyada'
  );

	//array of all font sizes.
	$font_sizes = array( 
		'10px' => '10px',
		'11px' => '11px',
	);
	
	$options = array();
	$imagepath =  get_template_directory_uri() . '/images/';

	
	for($n=12;$n<=200;$n+=1){
		$font_sizes[$n.'px'] = $n.'px';
	}
	
	// Pull all the pages into an array
	 $options_pages = array();
	 $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	 $options_pages[''] = 'Select a page:';
	 foreach ($options_pages_obj as $page) {
	  $options_pages[$page->ID] = $page->post_title;
	 }

	// array of section content.
	$section_text = array(	
			1 => array(
			'section_title'	=> 'Why Choose Us',
			'menutitle'		=> 'whychooseus',
			'bgcolor' 		=> '#f5f4f4',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[whychooseus icon="cog" title="HIGH TECHNOLOGY" description="Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque pena tibus et magnis dis parturient mon tes,nascetur." link="#"][whychooseus icon="building-o" title="GENERAL CONTRACTING" description="Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque pena tibus et magnis dis parturient mon tes,nascetur." link="#"][whychooseus icon="university" title="DESIGN PACKAGE" description="Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque pena tibus et magnis dis parturient mon tes,nascetur." link="#"][whychooseus icon="home" title="GREEN BUILDING" description="Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque pena tibus et magnis dis parturient mon tes,nascetur." link="#"][whychooseus icon="user-plus" title="HIGH STANDARD LABORS" description="Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque pena tibus et magnis dis parturient mon tes,nascetur." link="#"][whychooseus icon="thumbs-up" title="CREATIVE TEAM WORK" description="Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque pena tibus et magnis dis parturient mon tes,nascetur." link="#"]

			
			',
		),
		
			2 => array(
			'section_title'	=> '',
			'menutitle'		=> '',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> get_template_directory_uri().'/images/certifications.png',
			'class'			=> '',
			'content'		=> '[counter iconname="users" value="599" title="TOTAL CLIENTS"][counter iconname="university" value="5140" title="PROJECT COMPLETED"][counter iconname="user-secret" value="2350" title="WORKERS EMPLOYED"][counter iconname="trophy" value="125" title="RECEIVED AWARDS"]',
		),

 
			3 => array(
			'section_title'	=> 'Our Features',
			'menutitle'		=> 'featureservices',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[servicesbox color="#ffffff" bgcolor="#ba950b" image="'.get_template_directory_uri().'/images/services-icon-1.png" title="Planning & Designing" description="Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."][servicesbox color="#ffffff" bgcolor="#cea40b" image="'.get_template_directory_uri().'/images/services-icon-2.png" title="Project Management" description="Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."][servicesbox color="#ffffff" bgcolor="#ba950b" image="'.get_template_directory_uri().'/images/services-icon-3.png" title="Inspection & Testing" description="Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."][servicesbox color="#ffffff" bgcolor="#a88500" image="'.get_template_directory_uri().'/images/services-icon-4.png" title="Punctual Delivery Time" description="Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."]',
		),
		


			4 => array(
			'section_title'	=> 'Recent Project',
			'menutitle'		=> 'recentproject',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '
<div class="recentproject">
[subtitle color="#282828" size="18px" margin="0 0 50px 0" description="Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum legentis in iis qui facit eorum claritatem quarta decima."]
</div>

[recentproject_list][recentproject title="" image="'.get_template_directory_uri().'/images/gallery-1.jpg" link="#"][recentproject title="" image="'.get_template_directory_uri().'/images/gallery-2.jpg" link="#"][recentproject title="" image="'.get_template_directory_uri().'/images/gallery-3.jpg" link="#"][recentproject title="" image="'.get_template_directory_uri().'/images/gallery-4.jpg" link="#"][recentproject title="" image="'.get_template_directory_uri().'/images/gallery-5.jpg" link="#"][recentproject title="" image="'.get_template_directory_uri().'/images/gallery-6.jpg" link="#"][/recentproject_list]

[button align="center" name="VIEW ALL PROJECT" link="#" target=""]
			',
		),
		

		5 => array(
			'section_title'	=> 'Latest News',
			'menutitle'		=> 'latestposts',
			'bgcolor' 		=> '#f5f4f4',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[latestposts show="4" catid=""]'
		),

		6 => array(
			'section_title'	=> 'We are The BuildUp',
			'menutitle'		=> 'bytheme',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> get_template_directory_uri().'/images/bytheme.jpg',
			'class'			=> '',
			'content'		=> '
<div class="bytheme">
[subtitle color="#ffffff" size="25px" margin="0 0 20px 0" description="Do you need Professionals to project and build your dream home?"][subtitle color="#ffffff" size="18px" margin="0 0 50px 0" description="We offer the best engineers and builders to make your dreams come true."][button align="center" name="READ MORE" link="#" target=""]
</div>
[clear]
'
		),			
		
		7 => array(
			'section_title'	=> 'Creative Team',
			'menutitle'		=> 'ourteamsection',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> 'teamwrapper',
			'content'		=> '[our-team show="4" teammemberlength="30"][clear]'
		),			
		
		
		8 => array(
			'section_title'	=> '',
			'menutitle'		=> 'testimonialswhy',
			'bgcolor' 		=> '#f5f4f4',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '
[column_content type="one_half"]
<h2 class="section_title">Our Testimonials</h2>
[subtitle color="#282828" size="17px" margin="0 0 20px 0" description="Lorem Ipsum proin gravida nibh vel velit auctor aliquet."][testimonials]
[/column_content]

[column_content type="one_half_last"]
<h2 class="section_title">Why <span>Us?</span></h2>
[subtitle color="#282828" size="17px" margin="0 0 20px 0" description="Trusted By Over 7200+ Customers"][skill title="Creative Architecture" percent="100" bgcolor="#efc62c"][skill title="Interior Design" percent="70" bgcolor="#efc62c"][skill title="Building" percent="55" bgcolor="#efc62c"][skill title="Customer Support" percent="90" bgcolor="#efc62c"][/column_content]'
		),
				
		
		
		9 => array(
			'section_title'	=> 'Our Works',
			'menutitle'		=> 'ourgallery',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[photogallery filter="false" show="-1"]',
		),
		
		10 => array(
			'section_title'	=> 'Our Clients',
			'menutitle'		=> '',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[client_lists][client title="WORDPRESS" image="'.get_template_directory_uri().'/images/client-logo1.jpg" link="#"][client title="JQUERY" image="'.get_template_directory_uri().'/images/client-logo2.jpg" link="#"][client title="WOOCOMMERCE" image="'.get_template_directory_uri().'/images/client-logo3.jpg" link="#"][client title="BBPRESS" image="'.get_template_directory_uri().'/images/client-logo4.jpg" link="#"][client title="MY SQL" image="'.get_template_directory_uri().'/images/client-logo5.jpg" link="#"][/client_lists]',
		),		
 

					
	);

	$options = array();

	//Basic Settings
	$options[] = array(
		'name' => __('Basic Settings', 'buildup-pro'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'buildup-pro'),
		'desc' => __('Upload your main logo here', 'buildup-pro'),
		'id' => 'logo',
		'class' => '',
//		'std'	=> get_template_directory_uri().'/images/logo.png',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(		
		'desc' => __('Change your custom logo height', 'buildup-pro'),
		'id' => 'logoheight',
		'std' => '55',
		'type' => 'text');
		
	$options[] = array(	
		'name' => __('Site title & Description', 'buildup-pro'),		
		'desc'	=> __('Check To hide site title and description', 'buildup-pro'),
		'id'	=> 'hide_titledesc',
		'type'	=> 'checkbox',
		'std'	=> '');		
		
	$options[] = array(	
		'name' => __('Layout Option', 'buildup-pro'),		
		'desc'	=> __('Check To View Box Layout ', 'buildup-pro'),
		'id'	=> 'boxlayout',
		'type'	=> 'checkbox',
		'std'	=> '');
			
	$options[] = array(
		'name' => __('Sticky Header', 'buildup-pro'),
		'desc' => __('Check this to disable sticky header on scroll', 'buildup-pro'),
		'id' => 'headstick',
		'std' => '',
		'type' => 'checkbox');	
		
	$options[] = array(
		'name' => __('Header Top Social Icons', 'buildup-pro'),
		'desc' => __('Edit select social icons for header top', 'buildup-pro'),
		'id' => 'headersocial',
		'std' => ' [social_area] [social icon="facebook" link="#"] [social icon="twitter" link="#"] [social icon="google-plus" link="#"] [social icon="linkedin" link="#"] [social icon="rss" link="#"] [social icon="youtube" link="#"][/social_area]',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Header Top Info', 'buildup-pro'),
		'desc' => __('Edit header info from here. NOTE: Icon name should be in lowercase without space.(exa.phone) More social icons can be found at: http://fortawesome.github.io/Font-Awesome/icons/', 'buildup-pro'),
		'id' => 'headerinfo',
		'std' => '<i class="fa fa-phone"></i> +11 123 456 7890 <span class="phno"><a href="mailto:info@sitename.com"><i class="fa fa-envelope"></i>info@sitename.com</a></span>',
		'type' => 'textarea');		
		
			
	$options[] = array(
		'name' => __('Header top email and phone number strip', 'buildup-pro'),
		'desc' => __('uncheck this to disable header top strips', 'buildup-pro'),
		'id' => 'headtopstrip',
		'std' => 'tuue',
		'type' => 'checkbox');		
			
	$options[] = array(
		'name' => __('Disable Animation', 'buildup-pro'),
		'desc' => __('Check this to disable animation on scroll', 'buildup-pro'),
		'id' => 'scrollanimation',
		'std' => '',
		'type' => 'checkbox');		

	$options[] = array(
		'name' => __('Custom CSS', 'buildup-pro'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'buildup-pro'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');
			
	// font family start 		
	$options[] = array(
		'name' => __('Font Faces', 'buildup-pro'),
		'desc' => __('Select font for the body text', 'buildup-pro'),
		'id' => 'bodyfontface',
		'type' => 'select',
		'std' => 'PT Sans',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the textual logo', 'buildup-pro'),
		'id' => 'logofontface',
		'type' => 'select',
		'std' => 'Oswald',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the navigation text', 'buildup-pro'),
		'id' => 'navfontface',
		'type' => 'select',
		'std' => 'Oswald',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font family for all heading tag.', 'buildup-pro'),
		'id' => 'headfontface',
		'type' => 'select',
		'std' => 'Roboto Condensed',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for Section title', 'buildup-pro'),
		'id' => 'sectiontitlefontface',
		'type' => 'select',
		'std' => 'Roboto Condensed',
		'options' => $font_types );		
			
	$options[] = array(
		'desc' => __('Select font for Slide title', 'buildup-pro'),
		'id' => 'slidetitlefontface',
		'type' => 'select',
		'std' => 'Oswald',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font for Slide Description', 'buildup-pro'),
		'id' => 'slidedesfontface',
		'type' => 'select',
		'std' => 'Roboto Condensed',
		'options' => $font_types );	

		
	// font sizes start	
	$options[] = array(
		'name' => __('Font Sizes', 'buildup-pro'),
		'desc' => __('Select font size for body text', 'buildup-pro'),
		'id' => 'bodyfontsize',
		'type' => 'select',
		'std' => '14px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for textual logo', 'buildup-pro'),
		'id' => 'logofontsize',
		'type' => 'select',
		'std' => '35px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for navigation', 'buildup-pro'),
		'id' => 'navfontsize',
		'type' => 'select',
		'std' => '16px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for section title', 'buildup-pro'),
		'id' => 'sectitlesize',
		'type' => 'select',
		'std' => '30px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for footer title', 'buildup-pro'),
		'id' => 'ftfontsize',
		'type' => 'select',
		'std' => '20px',
		'options' => $font_sizes );	

	$options[] = array(
		'desc' => __('Select h1 font size', 'buildup-pro'),
		'id' => 'h1fontsize',
		'std' => '30px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h2 font size', 'buildup-pro'),
		'id' => 'h2fontsize',
		'std' => '28px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h3 font size', 'buildup-pro'),
		'id' => 'h3fontsize',
		'std' => '18px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h4 font size', 'buildup-pro'),
		'id' => 'h4fontsize',
		'std' => '22px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h5 font size', 'buildup-pro'),
		'id' => 'h5fontsize',
		'std' => '18px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h6 font size', 'buildup-pro'),
		'id' => 'h6fontsize',
		'std' => '16px',
		'type' => 'select',
		'options' => $font_sizes);


	// font colors start

	$options[] = array(
		'name' => __('Site Colors Scheme', 'buildup-pro'),
		'desc' => __('Change the color scheme of hole site', 'buildup-pro'),
		'id' => 'colorscheme',
		'std' => '#efc62c',
		'type' => 'color');
		
	$options[] = array(	
		'name' => __('Font Colors', 'buildup-pro'),	
		'desc' => __('Select font color for the body text', 'buildup-pro'),
		'id' => 'bodyfontcolor',
		'std' => '#575756',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for textual logo', 'buildup-pro'),
		'id' => 'logofontcolor',
		'std' => '#FFFFFF',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for logo tagline', 'buildup-pro'),
		'id' => 'logotaglinecolor',
		'std' => '#FFFFFF',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for header top phone and email strip', 'buildup-pro'),
		'id' => 'headertopfontcolor',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select font color for header social icons', 'buildup-pro'),
		'id' => 'socialfontcolor',
		'std' => '#a3a9ab',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for section title', 'buildup-pro'),
		'id' => 'sectitlecolor',
		'std' => '#282828',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for navigation', 'buildup-pro'),
		'id' => 'navfontcolor',
		'std' => '#FFFFFF',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for homepage top four boxes', 'buildup-pro'),
		'id' => 'hometopfourbxcolor',
		'std' => '#4c4c4c',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for homepage top four boxes title', 'buildup-pro'),
		'id' => 'hometopfourbxtitlecolor',
		'std' => '#282828',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for homepage top for boxes', 'buildup-pro'),
		'id' => 'hometopfourbxtitlecolorhv',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for homepage top four boxes read more text', 'buildup-pro'),
		'id' => 'topfourbxreadmorecolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for homepage top four boxes read more text', 'buildup-pro'),
		'id' => 'hometopfourbxreadmorehv',
		'std' => '#ffffff',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for widget title', 'buildup-pro'),
		'id' => 'wdgttitleccolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer title', 'buildup-pro'),
		'id' => 'foottitlecolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer', 'buildup-pro'),
		'id' => 'footdesccolor',
		'std' => '#d1d0d0',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer left text (copyright)', 'buildup-pro'),
		'id' => 'copycolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer right text (design by)', 'buildup-pro'),
		'id' => 'designcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font hover color for links / anchor tags', 'buildup-pro'),
		'id' => 'linkhovercolor',
		'std' => '#272727',
		'type' => 'color');			

	$options[] = array(
		'desc' => __('Select font color for sidebar li a', 'buildup-pro'),
		'id' => 'sidebarfontcolor',
		'std' => '#78797c',
		'type' => 'color');	
	
	$options[] = array(
		'desc' => __('Select font hover color for footer copyright links', 'buildup-pro'),
		'id' => 'copylinkshover',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h1 font color', 'buildup-pro'),
		'id' => 'h1fontcolor',
		'std' => '#272727',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select h2 font color', 'buildup-pro'),
		'id' => 'h2fontcolor',
		'std' => '#272727',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h3 font color', 'buildup-pro'),
		'id' => 'h3fontcolor',
		'std' => '#272727',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h4 font color', 'buildup-pro'),
		'id' => 'h4fontcolor',
		'std' => '#272727',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h5 font color', 'buildup-pro'),
		'id' => 'h5fontcolor',
		'std' => '#272727',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h6 font color', 'buildup-pro'),
		'id' => 'h6fontcolor',
		'std' => '#272727',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer social icons', 'buildup-pro'),
		'id' => 'footsocialcolor',
		'std' => '#c1c0c0',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for gallery filter ', 'buildup-pro'),
		'id' => 'galleryfiltercolor',
		'std' => '#010101',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font hover color for gallery filter ', 'buildup-pro'),
		'id' => 'galleryfiltercolorhv',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for photogallery title ', 'buildup-pro'),
		'id' => 'gallerytitlecolorhv',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for latest post title', 'buildup-pro'),
		'id' => 'latestpoststtlcolor',
		'std' => '#262626',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for client testimonilas title', 'buildup-pro'),
		'id' => 'testimonialtitlecolor',
		'std' => '#010103',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for client testimonilas description', 'buildup-pro'),
		'id' => 'testimonialdescriptioncolor',
		'std' => '#898989',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for sidebar widget box', 'buildup-pro'),
		'id' => 'widgetboxfontcolor',
		'std' => '#6e6d6d',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer recent posts', 'buildup-pro'),
		'id' => 'footerpoststitlecolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for toggle menu on responsive', 'buildup-pro'),
		'id' => 'togglemenucolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for our skills counter', 'buildup-pro'),
		'id' => 'counterdesccolor',
		'std' => '#383838',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for our skills title', 'buildup-pro'),
		'id' => 'countertitlecolor',
		'std' => '#262626',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font awesome icon color for our theme features section', 'buildup-pro'),
		'id' => 'fontawesomeiconcolor',
		'std' => '#272727',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font awesome icon color hover for our theme features section', 'buildup-pro'),
		'id' => 'fontawesomeiconcolorhv',
		'std' => '#ffffff',
		'type' => 'color');						

	$options[] = array(
		'desc' => __('Select font color for Why Choose Us Box ', 'buildup-pro'),
		'id' => 'whychoosecolor',
		'std' => '#888888',
		'type' => 'color');						
		
		
	$options[] = array(
		'desc' => __('Select font color for Why Choose Us Box Hover ', 'buildup-pro'),
		'id' => 'whychoosehvcolor',
		'std' => '#ffffff',
		'type' => 'color');						
		
	// Background start			
	$options[] = array(
		'name' => __('Background Colors', 'buildup-pro'),		
		'desc' => __('Select background color for header', 'buildup-pro'),
		'id' => 'headerbgcolor',
		'std' => '#101112',
		'type' => 'color');	

	$options[] = array(		
		'desc' => __('Select background opacity color for header', 'buildup-pro'),
		'id' => 'headeropacity',
		'std' => '0.5',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,));			


	$options[] = array(
		'desc' => __('Select background color for header top phone and email strip', 'buildup-pro'),
		'id' => 'headertopbgcolor',
		'std' => '#171819',
		'type' => 'color');	
			
	$options[] = array(
		'desc' => __('Select background color for header nav dropdown', 'buildup-pro'),
		'id' => 'navdpbgcolor',
		'std' => '#282828',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color homepage top four boxes', 'buildup-pro'),
		'id' => 'fourbxbgcolor',
		'std' => '#f8f8f8',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color Latest news boxes', 'buildup-pro'),
		'id' => 'newsbxbgcolor',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select background color for footer', 'buildup-pro'),
		'id' => 'footerbgcolor',
		'std' => '#131313',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select background color for copyright section', 'buildup-pro'),
		'id' => 'copybgcolor',
		'std' => '#131313',
		'type' => 'color');	

	$options[] = array(		
		'desc' => __('Select background opacity color for footer Copyright', 'buildup-pro'),
		'id' => 'copybgopacity',
		'std' => '0.5',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,));			



	$options[] = array(
		'desc' => __('Select background color for photogallery filter', 'buildup-pro'),
		'id' => 'galleryfilter',
		'std' => '#f1f1f1',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for client testimonials Box', 'buildup-pro'),
		'id' => 'testiboxbgcolor',
		'std' => '#ffffff',
		'type' => 'color');	
	
	$options[] = array(
		'desc' => __('Select background color for client testimonials Box border', 'buildup-pro'),
		'id' => 'testiboxbdcolor',
		'std' => '#dcdcdc',
		'type' => 'color');	
	


	$options[] = array(
		'desc' => __('Select background color for client testimonials pager dots', 'buildup-pro'),
		'id' => 'testidotsbgcolor',
		'std' => '#494949',
		'type' => 'color');	
	

	$options[] = array(
		'desc' => __('Select background color for sidebar widget box', 'buildup-pro'),
		'id' => 'widgetboxbgcolor',
		'std' => '#F0EFEF',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for our skill bar', 'buildup-pro'),
		'id' => 'skillbarbgcolor',
		'std' => '#E0DFDF',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for page boxes read more button', 'buildup-pro'),
		'id' => 'hometopfourbxreadmore',
		'std' => '#404040',
		'type' => 'color');			

	$options[] = array(
		'desc' => __('Select background color for Our team social icon', 'buildup-pro'),
		'id' => 'teamsocialiconbg',
		'std' => '#ffffff',
		'type' => 'color');					

	$options[] = array(
		'desc' => __('Select background color for Our Team Box', 'buildup-pro'),
		'id' => 'ourteambgcolor',
		'std' => '#f3f3f3',
		'type' => 'color');			

	$options[] = array(
		'desc' => __('Select background color for Why Choose Us', 'buildup-pro'),
		'id' => 'whychoosebgcolor',
		'std' => '#ffffff',
		'type' => 'color');			


	// Border colors			
	$options[] = array(	
		'name' => __('Border Colors', 'buildup-pro'),		
		'desc' => __('Select border color for sidebar li a', 'buildup-pro'),
		'id' => 'sidebarliaborder',
		'std' => '#d0cfcf',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for footer title', 'buildup-pro'),
		'id' => 'footertitleborder',
		'std' => '#312d2e',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for top navigation dropdown li', 'buildup-pro'),
		'id' => 'navlibdcolor',
		'std' => '#333333',
		'type' => 'color');
		
	$options[] = array(			
		'desc' => __('Select border color for gallery filter', 'buildup-pro'),
		'id' => 'galleryfilterbdr',
		'std' => '#494949',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for section title underline', 'buildup-pro'),
		'id' => 'sectitleunderlinecolor',
		'std' => '#282828',
		'type' => 'color');	

	$options[] = array(			
		'desc' => __('Select border color for All images', 'buildup-pro'),
		'id' => 'allimagesborder',
		'std' => '#ffffff',
		'type' => 'color');	
	

	// Default Buttons		
	$options[] = array(
		'name' => __('Button Colors', 'buildup-pro'),		
		'desc' => __('Select background hover color for default button', 'buildup-pro'),
		'id' => 'btnbghvcolor',
		'std' => '#202020',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select font color default button', 'buildup-pro'),
		'id' => 'btntxtcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font hover color for default button', 'buildup-pro'),
		'id' => 'btntxthvcolor',
		'std' => '#ffffff',
		'type' => 'color');
		
		
	//Team Member Boxes CSS	
	$options[] = array(
		'name' => __('Team Member Section Colors', 'buildup-pro'),			
		'desc' => __('Select font color for team member box', 'buildup-pro'),
		'id' => 'teambxfontcolor',
		'std' => '#404040',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for team member designation', 'buildup-pro'),
		'id' => 'teamsocialcolor',
		'std' => '#727171',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select font color for our team hover', 'buildup-pro'),
		'id' => 'teamdesignationcolor',
		'std' => '#ffffff',
		'type' => 'color');	

	// Slider Caption colors
	$options[] = array(	
		'name' => __('Slider Caption Colors', 'buildup-pro'),				
		'desc' => __('Select font color for slider title', 'buildup-pro'),
		'id' => 'slidetitlecolor',
		'std' => '#ffffff',
		'type' => 'color');			
		
	$options[] = array(		
		'desc' => __('Select font color for slider description', 'buildup-pro'),
		'id' => 'slidedesccolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font size for slider title', 'buildup-pro'),
		'id' => 'slidetitlefontsize',
		'type' => 'select',
		'std' => '37px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for slider description', 'buildup-pro'),
		'id' => 'slidedescfontsize',
		'type' => 'select',
		'std' => '17px',
		'options' => $font_sizes );
		
	// Slider controls colors		
	$options[] = array(
		'name' => __('Slider controls Colors', 'buildup-pro'),
		'desc' => __('Select background color for slider pager', 'buildup-pro'),
		'id' => 'sldpagebg',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for slider navigation arrows', 'buildup-pro'),
		'id' => 'sldarrowbg',
		'std' => '#000000',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select background opacity color for slider caption', 'buildup-pro'),
		'id' => 'slidercapbgpacity',
		'std' => '0.3',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,));			
		
	$options[] = array(
		'desc' => __('Select Background color for slider caption', 'buildup-pro'),
		'id' => 'slidercapbg',
		'std' => '',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select background opacity color for header slider navigation arrows', 'buildup-pro'),
		'id' => 'sldarrowopacity',
		'std' => '0.7',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,));			
		
	$options[] = array(
		'desc' => __('Select Border color for slider pager', 'buildup-pro'),
		'id' => 'sldpagehvbd',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select excerpt length for testimonials section', 'buildup-pro'),
		'id' => 'testimonialsexcerptlength',
		'std' => '35',
		'type' => 'text');


	$options[] = array(
		'desc' => __('If your content length in shortcode blog post.', 'furniture-pro'),
		'id' => 'newscontentlength',
		'std' => '20',
		'type' => 'text');

	$options[] = array(
		'desc' => __('Blog post page change text content lenth here ', 'furniture-pro'),
		'id' => 'blogpostpagecontent',
		'std' => '120',
		'type' => 'text');			


	$options[] = array(		
		'desc' => __('Select excerpt length for blog post', 'buildup-pro'),
		'id' => 'blogpostexcerptlength',
		'std' => '60',
		'type' => 'text');
		
	$options[] = array(		
		'desc' => __('Select excerpt length for footer latest posts', 'buildup-pro'),
		'id' => 'footerpostslength',
		'std' => '5',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Change read more button text for latest blog post shortcode section', 'buildup-pro'),
		'id' => 'readmoretext',
		'std' => 'Read More',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Change Show All Button text for photo gallery section', 'buildup-pro'),
		'id' => 'galleryshowallbtn',
		'std' => 'All',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Change menu word on responsive view', 'buildup-pro'),
		'id' => 'menuwordchange',
		'std' => 'Menu',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Blog Single Layout', 'buildup-pro'),
		'desc' => __('Select layout. eg:Boxed, Wide', 'buildup-pro'),
		'id' => 'singlelayout',
		'type' => 'select',
		'std' => 'singleright',
		'options' => array('singleright'=>'Blog Single Right Sidebar', 'singleleft'=>'Blog Single Left Sidebar', 'sitefull'=>'Blog Single Full Width', 'nosidebar'=>'Blog Single No Sidebar') );	
		
	$options[] = array(
		'name' => __('Woocommerce Page Layout', 'buildup-pro'),
		'desc' => __('Select layout. eg:right-sidebar, left-sidebar, full-width', 'buildup-pro'),
		'id' => 'woocommercelayout',
		'type' => 'select',
		'std' => 'woocommercesitefull',
		'options' => array('woocommerceright'=>'Woocommerce Right Sidebar', 'woocommerceleft'=>'Woocommerce Left Sidebar', 'woocommercesitefull'=>'Woocommerce Full Width') );	
		
	$options[] = array(	
		'name' => __('Testimonials Rotating Speed', 'buildup-pro'),	
		'desc' => __('manage testimonials rotating speed.', 'buildup-pro'),
		'id' => 'testimonialsrotatingspeed',
		'std' => '8000',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('True/False Auto play Testimonials.','buildup-pro'),
		'id' => 'testimonialsautoplay',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'True', 'false'=>'False'));			
		

	//Layout Settings
	$options[] = array(
		'name' => __('Sections', 'buildup-pro'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Who we are Section', 'buildup-pro'),
		'desc'	=> __('select page for Who we are section','buildup-pro'),
		'id' 	=> 'welcomebox',
		'type'	=> 'select',
		'options' => $options_pages,
	);

	$options[] = array(	
		'desc' => __('Change Sub Title text for  top Who We Are', 'buildup-pro'),
		'id' => 'whosubtitle',
		'std' => 'LEADERS IN CONSTRUCTION INDUSTRY!',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Select excerpt length for Who We Are page section', 'buildup-pro'),
		'id' => 'welcomepagelength',
		'std' => '100',
		'type' => 'text');

	$options[] = array(	
		'desc' => __('Change Read More text for Who We Are', 'buildup-pro'),
		'id' => 'whowearereadmore',
		'std' => 'OUR HISTORY',
		'type' => 'text');	

	$options[] = array(		
		'desc' => __('upload image for Who we are', 'buildup-pro'),
		'id' => 'welcomeboximage',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(			
			'desc'	=> __('Check to hide welcome section', 'buildup-pro'),
			'id'	=> 'hidewelcomesection',
			'type'	=> 'checkbox',
			'std'	=> '');	
	

	
	$options[] = array(	
		'name' => __('Top Four Box Services Section', 'buildup-pro'),
		'desc'	=> __('first Services box for frontpage section','buildup-pro'),
		'id' 	=> 'box1',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for first box.', 'buildup-pro'),
		'id' => 'boximg1',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Second Services box for frontpage section','buildup-pro'),
		'id' 	=> 'box2',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for second box.', 'buildup-pro'),
		'id' => 'boximg2',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Third Services box for frontpage section','buildup-pro'),
		'id' 	=> 'box3',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for third box.', 'buildup-pro'),
		'id' => 'boximg3',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Fourth Services box for frontpage section','buildup-pro'),
		'id' 	=> 'box4',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for fourth box.', 'buildup-pro'),
		'id' => 'boximg4',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(	
		'desc'	=> __('Fifth Services box for frontpage section','buildup-pro'),
		'id' 	=> 'box5',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for fifth box.', 'buildup-pro'),
		'id' => 'boximg5',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(	
		'desc'	=> __('Six Services box for frontpage section','buildup-pro'),
		'id' 	=> 'box6',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image for six box.', 'buildup-pro'),
		'id' => 'boximg6',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');	
		
	$options[] = array(	
		'desc' => __('Change read more button text for  top services four boxes ', 'buildup-pro'),
		'id' => 'readmorebutton',
		'std' => 'READ MORE',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Select excerpt length for services four boxes section', 'buildup-pro'),
		'id' => 'pageboxlength',
		'std' => '20',
		'type' => 'text');			
	
	$options[] = array(			
			'desc'	=> __('Check to hide above our services four column section', 'buildup-pro'),
			'id'	=> 'hidefourbxsec',
			'type'	=> 'checkbox',
			'std'	=> '');
			
	

	$options[] = array(
		'name' => __('Number of Sections', 'buildup-pro'),
		'desc' => __('Select number of sections', 'buildup-pro'),
		'id' => 'numsection',
		'type' => 'select',
		'std' => '10',
		'options' => array_combine(range(1,30), range(1,30)) );

	$numsecs = of_get_option( 'numsection', 10 );

	for( $n=1; $n<=$numsecs; $n++){
		$options[] = array(
			'desc' => __("<h3>Section ".$n."</h3>", 'buildup-pro'),
			'class' => 'toggle_title',
			'type' => 'info');	
	
		$options[] = array(
			'name' => __('Section Title', 'buildup-pro'),
			'id' => 'sectiontitle'.$n,
			'std' => ( ( isset($section_text[$n]['section_title']) ) ? $section_text[$n]['section_title'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section ID', 'buildup-pro'),
			'desc'	=> __('Enter your section ID here. SECTION ID MUST BE IN SMALL LETTERS ONLY AND DO NOT ADD SPACE OR SYMBOL.', 'buildup-pro'),
			'id' => 'menutitle'.$n,
			'std' => ( ( isset($section_text[$n]['menutitle']) ) ? $section_text[$n]['menutitle'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section Background Color', 'buildup-pro'),
			'desc' => __('Select background color for section', 'buildup-pro'),
			'id' => 'sectionbgcolor'.$n,
			'std' => ( ( isset($section_text[$n]['bgcolor']) ) ? $section_text[$n]['bgcolor'] : '' ),
			'type' => 'color');
			
		$options[] = array(
			'name' => __('Background Image', 'buildup-pro'),
			'id' => 'sectionbgimage'.$n,
			'class' => '',
			'std' => ( ( isset($section_text[$n]['bgimage']) ) ? $section_text[$n]['bgimage'] : '' ),
			'type' => 'upload');

		$options[] = array(
			'name' => __('Section CSS Class', 'buildup-pro'),
			'desc' => __('Set class for this section.', 'buildup-pro'),
			'id' => 'sectionclass'.$n,
			'std' => ( ( isset($section_text[$n]['class']) ) ? $section_text[$n]['class'] : '' ),
			'type' => 'text');
			
		$options[] = array(
			'name'	=> __('Hide Section', 'buildup-pro'),
			'desc'	=> __('Check to hide this section', 'buildup-pro'),
			'id'	=> 'hidesec'.$n,
			'type'	=> 'checkbox',
			'std'	=> '');

		$options[] = array(
			'name' => __('Section Content', 'buildup-pro'),
			'id' => 'sectioncontent'.$n,
			'std' => ( ( isset($section_text[$n]['content']) ) ? $section_text[$n]['content'] : '' ),
			'type' => 'editor');
	}


	//SLIDER SETTINGS
	$options[] = array(
		'name' => __('Homepage Slider', 'buildup-pro'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Inner Page Banner', 'buildup-pro'),
		'desc' => __('Upload inner page banner for site', 'buildup-pro'),
		'id' => 'innerpagebanner',
		'class' => '',
		'std'	=> get_template_directory_uri()."/images/inner-banner.jpg",
		'type' => 'upload');
		
		
	$options[] = array(
		'name' => __('Custom Slider Shortcode Area For Home Page', 'buildup-pro'),
		'desc' => __('Enter here your slider shortcode without php tag', 'buildup-pro'),
		'id' => 'customslider',
		'std' => '',
		'type' => 'textarea');		
		
	$options[] = array(
		'name' => __('Slider Effects and Timing', 'buildup-pro'),
		'desc' => __('Select slider effect.','buildup-pro'),
		'id' => 'slideefect',
		'std' => 'random',
		'type' => 'select',
		'options' => array('random'=>'Random', 'fade'=>'Fade', 'fold'=>'Fold', 'sliceDown'=>'Slide Down', 'sliceDownLeft'=>'Slide Down Left', 'sliceUp'=>'Slice Up', 'sliceUpLeft'=>'Slice Up Left', 'sliceUpDown'=>'Slice Up Down', 'sliceUpDownLeft'=>'Slice Up Down Left', 'slideInRight'=>'SlideIn Right', 'slideInLeft'=>'SlideIn Left', 'boxRandom'=>'Box Random', 'boxRain'=>'Box Rain', 'boxRainReverse'=>'Box Rain Reverse', 'boxRainGrow'=>'Box Rain Grow', 'boxRainGrowReverse'=>'Box Rain Grow Reverse' ));
		
	$options[] = array(
		'desc' => __('Animation speed should be multiple of 100.', 'buildup-pro'),
		'id' => 'slideanim',
		'std' => 500,
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add slide pause time.', 'buildup-pro'),
		'id' => 'slidepause',
		'std' => 4000,
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide Controllers', 'buildup-pro'),
		'desc' => __('Hide/Show Direction Naviagtion of slider.','buildup-pro'),
		'id' => 'slidenav',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Hide/Show pager of slider.','buildup-pro'),
		'id' => 'slidepage',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Pause Slide on Hover.','buildup-pro'),
		'id' => 'slidepausehover',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Yes', 'false'=>'No'));	
		
	$options[] = array(
		'name' => __('Slider Image 1', 'buildup-pro'),
		'desc' => __('First Slide', 'buildup-pro'),
		'id' => 'slide1',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider1.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 1', 'buildup-pro'),
		'id' => 'slidetitle1',
		'std' => 'Build Up Your Dreams Into Reality',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc1',
		'std' => 'Vestibulum porta ligula at quam suscipit pharetra about page that introduces them to potential site visitors. Duis rutrum tincidunt turpis, sit amet pharetra dui sodales ac potential site visitors.',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton1',
		'std' => 'READ MORE',
		'type' => 'text');	

	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl1',
		'std' => '#',
		'type' => 'text');		
		
	
	$options[] = array(
		'name' => __('Slider Image 2', 'buildup-pro'),
		'desc' => __('Second Slide', 'buildup-pro'),
		'class' => '',
		'id' => 'slide2',
		'std' => get_template_directory_uri()."/images/slides/slider2.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 2', 'buildup-pro'),
		'id' => 'slidetitle2',
		'std' => 'High Quality Architecture & Building',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc2',
		'std' => 'Suscipit pharetra about vestibulum porta ligula at quam  page that introduces them to potential site visitors. Duis rutrum tincidunt turpis, sit amet pharetra dui sodales.',
		'type' => 'textarea');	
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton2',
		'std' => 'READ MORE',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl2',
		'std' => '#',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Slider Image 3', 'buildup-pro'),
		'desc' => __('Third Slide', 'buildup-pro'),
		'id' => 'slide3',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider3.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 3', 'buildup-pro'),
		'id' => 'slidetitle3',
		'std' => 'Best Creative Builders Group With High Standard Labour',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc3',
		'std' => 'Duis rutrum tincidunt turpis, sit amet pharetra dui sodales ac. Vestibulum porta ligula at quam suscipit pharetra about page that introduces them to potential site visitors..',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton3',
		'std' => 'READ MORE',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl3',
		'std' => '#',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Slider Image 4', 'buildup-pro'),
		'desc' => __('Third Slide', 'buildup-pro'),
		'id' => 'slide4',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 4', 'buildup-pro'),
		'id' => 'slidetitle4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton4',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl4',
		'std' => '',
		'type' => 'text');				
	
	$options[] = array(
		'name' => __('Slider Image 5', 'buildup-pro'),
		'desc' => __('Fifth Slide', 'buildup-pro'),
		'id' => 'slide5',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 5', 'buildup-pro'),
		'id' => 'slidetitle5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton5',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl5',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 6', 'buildup-pro'),
		'desc' => __('Sixth Slide', 'buildup-pro'),
		'id' => 'slide6',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 6', 'buildup-pro'),
		'id' => 'slidetitle6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton6',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl6',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 7', 'buildup-pro'),
		'desc' => __('Seventh Slide', 'buildup-pro'),
		'id' => 'slide7',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 7', 'buildup-pro'),
		'id' => 'slidetitle7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton7',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl7',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 8', 'buildup-pro'),
		'desc' => __('Eighth Slide', 'buildup-pro'),
		'id' => 'slide8',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 8', 'buildup-pro'),
		'id' => 'slidetitle8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton8',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl8',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 9', 'buildup-pro'),
		'desc' => __('Ninth Slide', 'buildup-pro'),
		'id' => 'slide9',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 9', 'buildup-pro'),
		'id' => 'slidetitle9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton9',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl9',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 10', 'buildup-pro'),
		'desc' => __('Tenth Slide', 'buildup-pro'),
		'id' => 'slide10',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 10', 'buildup-pro'),
		'id' => 'slidetitle10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'buildup-pro'),
		'id' => 'slidedesc10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'buildup-pro'),
		'id' => 'slidebutton10',
		'std' => '',
		'type' => 'text');			
	
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'buildup-pro'),
		'id' => 'slideurl10',
		'std' => '',
		'type' => 'text');
	

	//Footer SETTINGS
	$options[] = array(
		'name' => __('Footer', 'buildup-pro'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Footer Layout', 'buildup-pro'),
		'desc' => __('footer Select layout. eg:Boxed, 1, 2, 3 and 4', 'buildup-pro'),
		'id' => 'footerlayout',
		'type' => 'select',
		'std' => 'fourcolumn',
		'options' => array('onecolumn'=>'Footer 1 column', 'twocolumn'=>'Footer 2 column', 'threecolumn'=>'Footer 3 column', 'fourcolumn'=>'Footer 4 column', ) );			

	$options[] = array(
		'desc' => __('Select background Image for footer', 'buildup-pro'),
		'id' => 'footerbgimage',
		'std' => get_template_directory_uri().'/images/slider3.jpg',
		'type' => 'upload');		 

	$options[] = array(
		'name' => __('Footer About Us', 'buildup-pro'),
		'desc' => __('abput us text title for footer', 'buildup-pro'),
		'id' => 'abouttitle',
		'std' => 'About us',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('About Us Description', 'buildup-pro'),
		'desc' => __('abput us text description for footer', 'buildup-pro'),
		'id' => 'aboutusdescription',
		'std' => '<p>Donec ut ex ac nulla pellentesque mollis in a enim Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin seduisque velit nibh.</br > </br >Donec ut ex ac nulla sapien mauris, vitae sodales tellus suspendisse suscipit velit id ultricies auctor.</p>',
		'type' => 'textarea');	
	
	$options[] = array(
		'name' => __('Latest Posts Title', 'buildup-pro'),
		'desc' => __('Footer latest posts title.', 'buildup-pro'),
		'id' => 'letestpoststitle',
		'std' => 'Recent Posts',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Footer Menu Title', 'buildup-pro'),
		'desc' => __('footer menu title.', 'buildup-pro'),
		'id' => 'footermenutitle',
		'std' => 'Main Navigation',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Footer Contact Info', 'buildup-pro'),
		'desc' => __('Add footer contact info ', 'buildup-pro'),
		'id' => 'contacttitle',
		'std' => 'Contact Info',
		'type' => 'text');	
		
	$options[] = array(	
		'desc' => __('Add company address here.', 'buildup-pro'),
		'id' => 'address',
		'std' => '227 Marion Street Avenue, UK',
		'type' => 'textarea');
		
	$options[] = array(		
		'desc' => __('Add phone number here.', 'buildup-pro'),
		'id' => 'phone',
		'std' => '1-888-123-4567',
		'type' => 'text');
		
	$options[] = array(		
		'desc' => __('Add fax number here.', 'buildup-pro'),
		'id' => 'fax',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('Add email address here.', 'buildup-pro'),
		'id' => 'email',
		'std' => 'info@sitename.com',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Footer Social Icons', 'buildup-pro'),
		'desc' => __('social icons for footer', 'buildup-pro'),
		'id' => 'footersocialicon',
		'std' => '[social_area]
			[social icon="facebook" link="#"]
			[social icon="twitter" link="#"]
			[social icon="linkedin" link="#"]
			[social icon="google-plus" link="#"]				
		[/social_area]
		',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Footer Copyright', 'buildup-pro'),
		'desc' => __('Copyright Text for your site.', 'buildup-pro'),
		'id' => 'copytext',
		'std' => ' Copyright &copy; 2017. All rights reserved',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Footre Text Link', 'buildup-pro'),
		'id' => 'ftlink',
		'std' => 'Design by <a href="'.esc_url('https://www.gracethemes.com/').'" target="_blank">Grace Themes</a>',
		'type' => 'textarea',);
		
	$options[] = array(
		'desc' => __('Footer Back to Top Button', 'buildup-pro'),
		'id' => 'backtotop',
		'std' => '[back-to-top]',
		'type' => 'textarea',);

	//Short codes
	$options[] = array(
		'name' => __('Short Codes', 'buildup-pro'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Photo Gallery', 'buildup-pro'),
		'desc' => __('[photogallery filter="true" show="8"]', 'buildup-pro'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Testimonials Rotator', 'buildup-pro'),
		'desc' => __('[testimonials]', 'buildup-pro'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('All Testimonials Listing', 'buildup-pro'),
		'desc' => __('[testimonials-listing show="10"]', 'buildup-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('Sidebar Testimonials Rotator', 'buildup-pro'),
		'desc' => __('[sidebar-testimonials]', 'buildup-pro'),
		'type' => 'info');		
		
	$options[] = array(
		'name' => __('Client Rotator', 'buildup-pro'),
		'desc' => __('[client_lists]<br />
		[client title="Enter here title" image="Enter here client image logo url with https:" link="#"]<br />
		[client title="Enter here title" image="Enter here client image logo url with https:" link="#"]<br />
		[client title="Enter here title" image="Enter here client image logo url with https:" link="#"]<br />
		[client title="Enter here title" image="Enter here client image logo url with https:" link="#"]<br />
		[client title="Enter here title" image="Enter here client image logo url with https:" link="#"]<br />
		[/client_lists]', 'buildup-pro'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Contact Form', 'buildup-pro'),
		'desc' => __('[contactform to_email="test@example.com" title="Contact Form"] 
', 'buildup-pro'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Our Team', 'buildup-pro'),
		'desc' => __('[our-team show="4" teammemberlength="25"]', 'buildup-pro'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Latest News', 'buildup-pro'),
		'desc' => __('[latestposts show="3" catid=""]', 'buildup-pro'),
		'type' => 'info');
		
		
	$options[] = array(
		'name' => __('Feature Services', 'buildup-pro'),
		'desc' => __('[servicesbox color="#ffffff" bgcolor="#1e9d74" image="http://www.yoururl.com/images/services-icon-1.png" title="6499 M" description="ALTITUDE HIKED"][servicesbox color="#ffffff" bgcolor="#169069" image="http://www.yoururl.com/images/services-icon-2.png" title="299 KM" description="DISTANCE COVERED"][servicesbox color="#ffffff" bgcolor="#128460" image="http://www.yoururl.com/images/services-icon-3.png" title="110 KG" description="CARBON OFFSET"][servicesbox color="#ffffff" bgcolor="#0b7956" image="http://www.yoururl.com/images/services-icon-4.png" title="707 DAYS" description="SPENT TREKKING"]', 'buildup-pro'),
		'type' => 'info');
		

	$options[] = array(
		'name' => __('Our Skills', 'buildup-pro'),
		'desc' => __('[skill title="Coding" percent="90" bgcolor="#65676a"][skill title="Design" percent="70" bgcolor="#65676a"][skill title="Building" percent="55" bgcolor="#65676a"][skill title="SEO" percent="100" bgcolor="#65676a"]', 'buildup-pro'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Custom Button', 'buildup-pro'),
		'desc' => __('[button align="center" name="View Gallery" link="#" target=""]', 'buildup-pro'),
		'type' => 'info');			
			
		$options[] = array(
		'name' => __('Our Counter', 'buildup-pro'),
		'desc' => __('[counter iconname="user" value="4599" title="Fashion"][counter iconname="user" value="4599" title="Wedding"][counter iconname="cog" value="999" title="Industrial"][counter iconname="picture-o" value="560" title="Sessions"]', 'buildup-pro'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Search Form', 'buildup-pro'),
		'desc' => __('[searchform]', 'buildup-pro'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Social Icons ( Note: More social icons can be found at: http://fortawesome.github.io/Font-Awesome/icons/)', 'buildup-pro'),
		'desc' => __('[social_area]<br />
			[social icon="facebook" link="#"]<br />
			[social icon="twitter" link="#"]<br />
			[social icon="linkedin" link="#"]<br />
			[social icon="google-plus" link="#"]<br />
		[/social_area]', 'buildup-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('2 Column Content', 'buildup-pro'),
		'desc' => __('<pre>
[column_content type="one_half"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_half_last"]
	Column 2 Content goes here...
[/column_content]
</pre>', 'buildup-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('3 Column Content', 'buildup-pro'),
		'desc' => __('<pre>
[column_content type="one_third"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_third"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_third_last"]
	Column 3 Content goes here...
[/column_content]
</pre>', 'buildup-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('4 Column Content', 'buildup-pro'),
		'desc' => __('<pre>
[column_content type="one_fourth"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fourth"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fourth"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fourth_last"]
	Column 4 Content goes here...
[/column_content]
</pre>', 'buildup-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('5 Column Content', 'buildup-pro'),
		'desc' => __('<pre>
[column_content type="one_fifth"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fifth"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fifth"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fifth"]
	Column 4 Content goes here...
[/column_content]

[column_content type="one_fifth_last"]
	Column 5 Content goes here...
[/column_content]
</pre>', 'buildup-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('Tabs', 'buildup-pro'),
		'desc' => __('<pre>
[tabs]
	[tab title="TAB TITLE 1"]
		TAB CONTENT 1
	[/tab]
	[tab title="TAB TITLE 2"]
		TAB CONTENT 2
	[/tab]
	[tab title="TAB TITLE 3"]
		TAB CONTENT 3
	[/tab]
[/tabs]
</pre>', 'buildup-pro'),
		'type' => 'info');


	$options[] = array(
		'name' => __('Toggle Content', 'buildup-pro'),
		'desc' => __('<pre>
[toggle_content title="Toggle Title 1"]
	Toggle content 1...
[/toggle_content]
[toggle_content title="Toggle Title 2"]
	Toggle content 2...
[/toggle_content]
[toggle_content title="Toggle Title 3"]
	Toggle content 3...
[/toggle_content]
</pre>', 'buildup-pro'),
		'type' => 'info');


	$options[] = array(
		'name' => __('Accordion Content', 'buildup-pro'),
		'desc' => __('<pre>
[accordion]
	[accordion_content title="ACCORDION TITLE 1"]
		ACCORDION CONTENT 1
	[/accordion_content]
	[accordion_content title="ACCORDION TITLE 2"]
		ACCORDION CONTENT 2
	[/accordion_content]
	[accordion_content title="ACCORDION TITLE 3"]
		ACCORDION CONTENT 3
	[/accordion_content]
[/accordion]
</pre>', 'buildup-pro'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Clear', 'buildup-pro'),
		'desc' => __('<pre>
[clear]
</pre>', 'buildup-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('HR / Horizontal separation line', 'buildup-pro'),
		'desc' => __('<pre>
[hr] or &lt;hr&gt;
</pre>', 'buildup-pro'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Subtitle', 'buildup-pro'),
		'desc' => __('[subtitle color="#111111" size="15px" margin="0 0 50px 0" align="center" description="short descriptio here"]', 'buildup-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('Read More Button', 'buildup-pro'),
		'desc' => __('[button align="center" name="READ MORE" link="#" target=""]', 'buildup-pro'),
		'type' => 'info');	
	
	$options[] = array(
		'name' => __('Scroll to Top', 'buildup-pro'),
		'desc' => __('[back-to-top] 
', 'buildup-pro'),
		'type' => 'info');

	return $options;
}