const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)

        if (entry.isIntersecting) {
            entry.target.classList.add('show'); 
        }

    });
});

const hiddenElem = document.querySelectorAll('.hidden');
hiddenElem.forEach((el) => observer.observe(el));

//this code is taken from Beyond Fireship channel on youtube
//https://www.youtube.com/watch?v=T33NN_pPeNI