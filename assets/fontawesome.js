import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faEnvelope, faLocationDot, faPhone } from '@fortawesome/free-solid-svg-icons';
import { faGithub, faLinkedinIn } from '@fortawesome/free-brands-svg-icons';

library.add(faGithub);
library.add(faLinkedinIn);
library.add(faLocationDot);
library.add(faEnvelope);
library.add(faPhone);
dom.watch();
