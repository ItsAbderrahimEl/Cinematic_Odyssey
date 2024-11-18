import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

import searchMovie from "./AlpineComponents/searchMovie.js";
import videoModal from "./AlpineComponents/videoModal.js";
import imageModal from "./AlpineComponents/imageModal.js";
import actorModal from "./AlpineComponents/actorModal.js";
import searchActor from "./AlpineComponents/searchActor.js";
import searchSeries from "./AlpineComponents/searchSeries.js";
import profile from "./AlpineComponents/profile.js";
import profileModal from "./AlpineComponents/profileModal.js";

window.profile = profile
window.searchMovie = searchMovie
window.videoModal = videoModal
window.imageModal = imageModal
window.actorModal = actorModal
window.searchActor = searchActor
window.searchSeries = searchSeries
window.profileModal = profileModal

window.Alpine = Alpine
AOS.init ({
    duration : 2000
})

