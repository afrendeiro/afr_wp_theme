<!--
// Email obfuscator script 2.1 by Tim Williams, University of Arizona
// Random encryption key feature by Andrew Moulden, Site Engineering Ltd
// This code is freeware provided these four comment lines remain intact
// A wizard to generate this code is at http://www.jottings.com/obfuscator/
{ coded = "c6smB8mns5@t9cnN.w59"
  key = "5S87Uj9bFYH4lshBqTGapMWCx1vPeXDfNkVuKiRcZgoLdAzymI263EOr0nJwQt"
  shift=coded.length
  link=""
  for (i=0; i<coded.length; i++) {
    if (key.indexOf(coded.charAt(i))==-1) {
      ltr = coded.charAt(i)
      link += (ltr)
    }
    else {     
      ltr = (key.indexOf(coded.charAt(i))-shift+key.length) % key.length
      link += (key.charAt(ltr))
    }
  }
document.write("<a class='socialIcons' title='Email me' alt='Mail Icon' target='_blank' href='mailto:"+link+"'><img class='social' src='/wp-content/themes/wp_labnotebook/img/32x32/email-32.png'></a>")
}
//-->