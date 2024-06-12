$(function () {
    "use strict";

    $('.new-arrivals').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            1366: {
                items: 4
            },
            1400: {
                items: 5
            }
        },
    })

    $('.browse-category').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 3
            },
            768: {
                items: 4
            },
            1366: {
                items: 5
            },
            1400: {
                items: 6
            }
        },
    })


    $('.latest-news').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1024: {
                items: 3
            },
            1366: {
                items: 4
            }
        }
    })

    $('.brands-shops').owlCarousel({
        loop: true,
        margin: 0,
        responsiveClass: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1024: {
                items: 3
            },
            1366: {
                items: 5
            }
        }
    })

    $('.product-gallery').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: false,
        dots: false,
        thumbs: true,
        thumbsPrerendered: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
});

// Select all quantity input elements
const quantityInputs = document.querySelectorAll('.quantity-input');
const decrementButtons = document.querySelectorAll('.btn-decrement');
const incrementButtons = document.querySelectorAll('.btn-increment');


// Increment and Decrement of product quantity
// Loop through each quantity input element
quantityInputs.forEach((quantityInput, index) => {
    const decrementButton = decrementButtons[index];
    const incrementButton = incrementButtons[index];

    decrementButton.addEventListener('click', () => {
        const currentValue = parseInt(quantityInput.value);
        const newValue = Math.max(1, currentValue - 1); // Ensure minimum of 1
        quantityInput.value = newValue;
        console.log(newValue)
    });

    incrementButton.addEventListener('click', () => {
        const currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
        console.log(currentValue + 1)

    });
});


// User Cart request and response handling through fetch for updating cart (database / cookies)
document.querySelectorAll('.add-to-cart-button').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        let productId = this.dataset.productId;
        let quantity = document.getElementById('quantity_' + productId).value;
        let size = document.getElementById('size_' + productId).value;

        // Start loading effect
        this.classList.add('loading-button');
        this.querySelector('.spinner').style.display = 'block';
        const buttonElement = this;
        if (this.classList.contains('disabled-new')) {
            event.preventDefault(); // Prevent any linked action
            event.stopPropagation(); // Stop the event from bubbling up
            return false; // No further action
        }

        // Otherwise, handle the click normally
        // (e.g., start animations, fetch requests, etc.)
        this.classList.add('disabled-new'); // Disable the button after the click
        // Delay the fetch request by 2 seconds
        setTimeout(() => {
            fetch('/add-to-cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity,
                        size: size
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        // Stop loading effect
                        buttonElement.classList.remove('loading-button');
                        buttonElement.querySelector('.spinner').style.display = 'none';

                        // Start tick animation
                        let overlay = buttonElement.querySelector('.success-overlay');
                        overlay.style.display = 'flex';
                        setTimeout(() => {
                            overlay.classList.add('visible');
                        }, 10); // Ensure CSS transition works

                        setTimeout(() => {
                            overlay.classList.remove('visible');
                            setTimeout(() => {
                                overlay.style.display = 'none';
                                // Trigger confetti animation
                                buttonElement.classList.add('animate');
                                setTimeout(() => {
                                    buttonElement.classList.remove('animate');
                                    this.classList.remove('disabled-new'); // Re-enable the button after some operation
                                    // Smooth scroll to the top and open cart
                                    smoothScrollToTopAndOpenCart(1000,updateCartCount)
                                }, 500); // Match the duration of confetti animation
                            }, 300); // Fade out delay

                        }, 1000); // Tick display time
                    } else if (data.errors) {
                        let errorMessage = "Please correct the following errors:\n";
                        for (let key in data.errors) {
                            errorMessage += `${key}: ${data.errors[key].join(", ")}\n`;
                        }
                        alert(errorMessage);
                        console.log(data.errors)
                    } else if (data.errormessage) {
                        alert(data.errormessage);
                        console.log(data);
                        // Stop loading effect
                        buttonElement.classList.remove('loading-button');
                        this.querySelector('.spinner').style.display = 'none';
                        this.classList.remove('disabled-new'); // Re-enable the button after some operation
                    }
                })
                .catch(error => {
                    alert("Something went wrong");
                    console.log("Something went wrong");
                    // Stop loading effect in case of error
                    buttonElement.classList.remove('loading-button');
                    this.querySelector('.spinner').style.display = 'none';
                    this.classList.remove('disabled-new'); // Re-enable the button after some operation
                });
        }, 1);
    });
});

function smoothScrollToTopAndOpenCart(duration, callback) {
    let start = null;
    const top = 0;
    const startScrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    window.requestAnimationFrame(function step(timestamp) {
        if (!start) start = timestamp;
        const progress = timestamp - start;
        const currentStep = Math.min(progress / duration, 1);
        window.scrollTo(0, startScrollPosition + (top - startScrollPosition) * currentStep);

        if (progress < duration) {
            window.requestAnimationFrame(step);
        } else {
            if (callback){
                openCartModal() 
                callback()
            };
        }
    });
}

function updateCartCount() {
    console.log("update cart executed")
    fetch('/api/cart/count') // Assuming you have set up this API endpoint
        .then(response => response.json())
        .then(data => {
            if (data) {
                console.log(data);
                document.getElementById('productCount').innerText = data;
            }
        })
        .catch(error => {
            console.error('Error fetching cart count:', error);
        });
}

function openCartModal() {
    const cartButton = document.querySelector('.cart-link.dropdown-toggle');
    if (cartButton) {
        cartButton.click();
    }
}

$(function() {
    $(".HeartAnimation").click(function() {
    $(this).toggleClass("animate");
    });
    });
