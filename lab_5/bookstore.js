// Hero rotation for the home page
var heroItems = [
  { src: 'images/book1.jpg', link: '1.html', title: 'The Great Gatsby' },
  { src: 'images/book2.jpg', link: '2.html', title: 'The Hobbit' },
  { src: 'images/book3.jpg', link: '3.html', title: 'Paradox' },
  { src: 'images/book4.jpg', link: '4.html', title: 'Harry Potter and the Deathly Hallows' }
];

var current = 0;
var heroImg = document.getElementById('hero-img');
var heroLink = document.getElementById('hero-link');

if (heroImg && heroLink) {
  setInterval(function () {
    current = current + 1;
    if (current >= heroItems.length) {
      current = 0;
    }
    heroImg.src = heroItems[current].src;
    heroImg.alt = heroItems[current].title;
    heroLink.href = heroItems[current].link;
  }, 3000);
}

// Highlight inputs on focus
var inputs = document.querySelectorAll('input');
for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('focus', function () {
    this.className = 'focused';
  });
  inputs[i].addEventListener('blur', function () {
    this.className = '';
  });
}

// Validate the create account form
var createBtn = document.getElementById('create-btn');
if (createBtn) {
  createBtn.addEventListener('click', validateForm);
}

function validateForm() {
  var first = document.getElementById('first').value;
  var last = document.getElementById('last').value;
  var phone = document.getElementById('phone').value;
  var email = document.getElementById('email').value;
  var address = document.getElementById('address').value;
  var birth = document.getElementById('birthdate').value;
  var pw = document.getElementById('password').value;
  var pw2 = document.getElementById('password2').value;
  var message = document.getElementById('form-message');

  var errors = '';

  if (first.length < 2) {
    errors += 'Please enter your first name.<br>';
  }
  if (last.length < 2) {
    errors += 'Please enter your last name.<br>';
  }

  var digits = phone.replace(/\D/g, '');
  if (digits.length < 10) {
    errors += 'Please enter a valid phone number.<br>';
  }

  if (email.indexOf('@') === -1 || email.indexOf('.') === -1) {
    errors += 'Please enter a valid email address.<br>';
  }

  if (address.length < 5) {
    errors += 'Please enter your address.<br>';
  }

  if (!birth) {
    errors += 'Please enter your birthdate.<br>';
  }

  if (pw.length < 6) {
    errors += 'Password must be at least 6 characters.<br>';
  }

  if (pw !== pw2) {
    errors += 'Passwords do not match.<br>';
  }

  if (errors !== '') {
    message.innerHTML = errors;
    message.style.color = 'maroon';
  } else {
    message.innerHTML = 'Account created!';
    message.style.color = 'green';
  }
}
