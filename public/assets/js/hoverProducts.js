const baseUrl = window.location.href;
let displacementImageRoute;

if (baseUrl === 'http://127.0.0.1/dressing/creator') {
    displacementImageRoute = '../assets/images/displacements/10.jpg';
} else {
    displacementImageRoute = '../../assets/images/displacements/10.jpg';
}

Array.from(document.querySelectorAll('.imgBox')).forEach((e) => {
    const imgs = Array.from(e.querySelectorAll('img'));
    new hoverEffect({
        parent: e,
        intensity: 0.3,
        image1: imgs[0].getAttribute('src'),
        image2: imgs[1].getAttribute('src'),
        displacementImage: displacementImageRoute
    });
});

