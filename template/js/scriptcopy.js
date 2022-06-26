// Мобильная версия
const menuIcon = document.querySelector('.button__icon');
const menuList = document.querySelector('.menu__nav');
const headerMenu = document.querySelector('.header__menu');
const body = document.querySelector('body');
// Валидация
const form = document.querySelector('#signUp');
const nameInput = document.querySelector('#name');
const emailInput = document.querySelector('#email');
const phoneInput = document.querySelector('#phone');
const passwordInput = document.querySelector('#password');
const secondPasswordInput = document.querySelector('#secondPassword');
const fileInput = document.querySelector('#file');
const fileView = document.querySelector('.file__view');
const nameErrorText = document.querySelector('#nameError');
const emailErrorText = document.querySelector('#emailError');
const phoneErrorText = document.querySelector('#phoneError');
const passwordErrorText = document.querySelector('#passwordError');
const secondPasswordErrorText = document.querySelector('#secondPasswordError');
const fileErrorText = document.querySelector('#fileError');
const input = document.querySelector('.form__imput');
// Выподающее меню категорий
const arrow = document.querySelector('.arrow__icon');

// Анимация
let elements = document.querySelectorAll('.element__animation');


// Кнопка вызова меню для мобильной версии сайта
menuIcon.onclick = function(){
    menuList.classList.toggle('open');
    headerMenu.classList.toggle('open');
    body.classList.toggle('fixed');
}





// Анимации появления при прокрутки сайта
function onEntry(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
        change.target.classList.add('element__show');
      }
    });
  }
  let options = { threshold: [0.5] };
  let observer = new IntersectionObserver(onEntry, options);

if (screen.width > 767) {
  for (let elm of elements) {
    observer.observe(elm);
  }
}

// Кнопка для возврата в начало сайта
window.addEventListener('scroll', function() {
  let scroll = this.document.querySelector('.up__link');
  scroll.classList.toggle('active', this.window.scrollY > 500);
});


// Валидация
function checkInclude(name, array){
  for (let i=0; i < array.length; i++) {
    if (name.indexOf(array[i]) != -1) {
      return true;
    }
  }
}

function checkName(name){
  errorName = '';
  let arr_en = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
   'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' '];

  let arr_EN = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
  'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', ' '];

  if (name == '') {
    nameInput.classList.add('error');
    nameErrorText.style.opacity = 1;
    nameErrorText.style.transform = 'translateY(0%)';
    return true;
  }
  if (checkInclude(name, arr_en) || checkInclude(name, arr_EN)) {
    input.classList.add('error')
    nameErrorText.style.opacity = 1;
    nameErrorText.style.transform = 'translateY(0%)';
    return true;
  }
  return false;
}

function checkEmail(email) {

  let re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
  if (!re.test(email)) {
    emailInput.classList.add('error')
    emailErrorText.style.opacity = 1;
    emailErrorText.style.transform = 'translateY(0%)';
    return true;
  }
  return false;
}

function checkPhone(phone) {
  if (phone == '' || phone.length < 11) {
    phoneInput.classList.add('error')
    phoneErrorText.style.opacity = 1;
    phoneErrorText.style.transform = 'translateY(0%)';
    return true;
  }
  return false;
}

function checkPassword(firstPassword, secondPassword) {

  if ( firstPassword.length < 3 || firstPassword == '') {
    passwordInput.classList.add('error');
    passwordErrorText.style.opacity = 1;
    passwordErrorText.style.transform = 'translateY(0%)';
    return true;
  }
  if (firstPassword != secondPassword) {
    secondPasswordInput.classList.add('error')
    secondPasswordErrorText.style.opacity = 1;
    secondPasswordErrorText.style.transform = 'translateY(0%)';
    return true;
  }
  return false;
}

function checkFile(fileName) {
  console.log(fileName[fileName.length - 1]);
  if (fileName[fileName.length - 1] == 'pdf' || fileName[fileName.length - 1] == 'docx' 
  || fileName[fileName.length - 1] == 'doc' || fileName[fileName.length - 1] == 'PDF') {
    return false
  } else {
    fileView.classList.add('error')
    fileErrorText.style.opacity = 1;
    fileErrorText.style.transform = 'translateY(0%)';
  }
}

if (form) {
  form.addEventListener('submit', function(evt){
    evt.preventDefault();
    if (input) {
      input.classList.remove('error')
      nameErrorText.style.opacity = 0;
      nameErrorText.style.transform = 'translateY(-10%)';
    }
    
    if (emailInput) {
      emailInput.classList.remove('error')
      emailErrorText.style.opacity = 0;
      emailErrorText.style.transform = 'translateY(-10%)';
    }
    
    if (phoneInput) {
      phoneInput.classList.remove('error')
      phoneErrorText.style.opacity = 0;
      phoneErrorText.style.transform = 'translateY(-10%)';
    }
    
    if (passwordInput) {
      passwordInput.classList.remove('error')
      passwordErrorText.style.opacity = 0;
      passwordErrorText.style.transform = 'translateY(-10%)';
    }

    if (secondPasswordInput) {
      secondPasswordInput.classList.remove('error')
      secondPasswordErrorText.style.opacity = 0;
      secondPasswordErrorText.style.transform = 'translateY(-10%)';
    }

    if (fileInput && fileView) {
      fileView.classList.remove('error')
      fileErrorText.style.opacity = 0;
      fileErrorText.style.transform = 'translateY(-10%)';
    }
    
    if (nameInput) {
      var checkedName = checkName(nameInput.value);
    }
    let checkedEmail = checkEmail(emailInput.value);
    let checkedPhone = checkPhone(phoneInput.value);
    if (passwordInput) {
      var checkedPassword = checkPassword(passwordInput.value, secondPasswordInput.value);
    }
    if (fileInput) {
      var checkedFile = checkFile(fileInput.value.split('.'));
    }

  
  
    if (checkedName || checkedEmail || checkedPhone || checkedPassword || checkedFile) {
      return false
    }
  
    this.submit();
  });
}

if (fileInput) {
  fileInput.addEventListener('change', function() {
    let filname = fileInput.value.split('\\');
    let fileText = document.querySelector('.file__text');
    if (filname[2].length > 15) {
      fileText.innerHTML = filname[2].substr(0, 15)+ '...';
      return
    }
    fileText.innerHTML = filname[2];
  });
}



// Изменения данных пользователя
var valueInput = '';

function closeNameInput(id) {
  let nameInput = document.querySelector(id);
  if (nameInput) {
    let area = document.querySelector('#user__name');
    let noIcon = document.querySelector('#no__icon__name');
    let yesIcon = document.querySelector('#ok__icon__name');
    let updateIcon = document.querySelector('#update__icon__name');


    updateIcon.style.visibility = 'visible';
    noIcon.style.visibility = 'hidden';
    yesIcon.style.visibility = 'hidden';
    area.innerHTML = valueInput;
  }
  return false;
}
function closePhoneInput(id) {
  let phoneInput = document.querySelector(id);
  if (phoneInput) {
    let area = document.querySelector('#user__phone');
    let noIcon = document.querySelector('#no__icon__phone');
    let yesIcon = document.querySelector('#ok__icon__phone');
    let updateIcon = document.querySelector('#update__icon__phone');


    updateIcon.style.visibility = 'visible';
    noIcon.style.visibility = 'hidden';
    yesIcon.style.visibility = 'hidden';
    area.innerHTML = valueInput;
  }
  return false;

}
function closeEmailInput(id) {
  let emailInput = document.querySelector(id);
  if (emailInput) {
    let area = document.querySelector('#user__email');
    let noIcon = document.querySelector('#no__icon__email');
    let yesIcon = document.querySelector('#ok__icon__email');
    let updateIcon = document.querySelector('#update__icon__email');


    updateIcon.style.visibility = 'visible';
    noIcon.style.visibility = 'hidden';
    yesIcon.style.visibility = 'hidden';
    area.innerHTML = valueInput;
  }
  return false;

}

function updateUserData(id, update, no, ok) {

  closeNameInput('#input__user__name');
  closePhoneInput('#input__user__phone');
  closeEmailInput('#input__user__email');



  let area = document.querySelector(id);
  let updateIcon = document.querySelector(update);
  let noIcon = document.querySelector(no);
  let okIcon = document.querySelector(ok);

  const areaValue = area.textContent;
  valueInput = areaValue;
  
  updateIcon.style.visibility = 'hidden';
  noIcon.style.visibility = 'visible';
  okIcon.style.visibility = 'visible';

  let idInput = id.replace('#', '');

  area.innerHTML = '<input type="text" class="table__input" id="input__' + idInput + '" value="' + areaValue + '">';  
}

function closeInput(id, update, no, ok) {

  let area = document.querySelector(id);
  let updateIcon = document.querySelector(update);
  let noIcon = document.querySelector(no);
  let okIcon = document.querySelector(ok);

  updateIcon.style.visibility = 'visible';
  noIcon.style.visibility = 'hidden';
  okIcon.style.visibility = 'hidden';


  area.innerHTML = valueInput;
  valueInput = '';
}


function saveUpdate(id, update, no, ok, inputName) {
  
  let area = document.querySelector(id);
  let inputValue = document.querySelector(inputName);
  let updateIcon = document.querySelector(update);
  let noIcon = document.querySelector(no);
  let okIcon = document.querySelector(ok);

  updateIcon.style.visibility = 'visible';
  noIcon.style.visibility = 'hidden';
  okIcon.style.visibility = 'hidden';


  area.innerHTML = inputValue.value;
  valueInput = '';
}


function toDoActive(id) {
  let all = document.querySelector('#all');
  let spetz = document.querySelector('#spetz');
  let managers = document.querySelector('#managers');
  let worker = document.querySelector('#worker');

  all.classList.remove('active');
  spetz.classList.remove('active');
  managers.classList.remove('active');
  worker.classList.remove('active');

  let itemActive = document.querySelector(id);
  itemActive.classList.add('active');
}

if (arrow) {
  arrow.addEventListener('click', function() {
    let listMenu = document.querySelector('.category__choice');
    let MenuIcon = document.querySelector('.arrow__icon');

    listMenu.classList.toggle("checked");
    MenuIcon.classList.toggle("checked");
    let panel = listMenu.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      console.log(panel.scrollHeight);
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

function showApplicationTable() {
  const tableApp = document.querySelector('.tables__application');
  const tableCategory = document.querySelector('.tables__category');
  const tableVacancy = document.querySelector('.tables__vacancy');
  tableApp.style.display = 'block';
  tableCategory.style.display = 'none';
  tableVacancy.style.display = 'none';
}

function showCategoryTable() {
  const tableApp = document.querySelector('.tables__application');
  const tableCategory = document.querySelector('.tables__category');
  const tableVacancy = document.querySelector('.tables__vacancy');
  tableApp.style.display = 'none';
  tableCategory.style.display = 'block';
  tableVacancy.style.display = 'none';
}

function showVacancyTable() {
  const tableApp = document.querySelector('.tables__application');
  const tableCategory = document.querySelector('.tables__category');
  const tableVacancy = document.querySelector('.tables__vacancy');
  tableApp.style.display = 'none';
  tableCategory.style.display = 'none';
  tableVacancy.style.display = 'block';
}

function adminToDoActive(id, f) {
  let adminApplication = document.querySelector('#adminApplication');
  let adminCategory = document.querySelector('#adminCategory');
  let amdinVacancy = document.querySelector('#amdinVacancy');

  adminApplication.classList.remove('active');
  adminCategory.classList.remove('active');
  amdinVacancy.classList.remove('active');

  let itemActive = document.querySelector(id);
  itemActive.classList.add('active');

  f();
}

// Слайдер

// Slider(all Slides in a container)
const slider = document.querySelector(".slider");
if (slider) {
  // All trails 
  const trail = document.querySelector(".trail").querySelectorAll("div");

  // Transform value
  let value = 0
  // trail index number
  let trailValue = 0
  // interval (Duration)
  let interval = 4000

  // Function to slide forward
  const slide = (condition) => {
      // CLear interval
      clearInterval(start)
      // update value and trailValue
      condition === "increase" ? initiateINC() : initiateDEC()
      // move slide
      move(value, trailValue)
      // Restart Animation
      animate()
      // start interal for slides back 
      start = setInterval(() => slide("increase"), interval);
  }

  // function for increase(forward, next) configuration
  const initiateINC = () => {
      // Remove active from all trails
      trail.forEach(cur => cur.classList.remove("active"))
      // increase transform value
      value === 80 ? value = 0 : value += 20
      // update trailValue based on value
      trailUpdate()
  }

  // function for decrease(backward, previous) configuration
  const initiateDEC = () => {
      // Remove active from all trails
      trail.forEach(cur => cur.classList.remove("active"))
      // decrease transform value
      value === 0 ? value = 80 : value -= 20
      // update trailValue based on value
      trailUpdate()
  }

  // function to transform slide 
  const move = (S, T) => {
      // transform slider
      slider.style.transform = `translateX(-${S}%)`
      //add active class to the current trail
      trail[T].classList.add("active")
  }

  const tl = gsap.timeline({defaults: {duration: 0.6, ease: "power2.inOut"}})
  tl.from(".bg", {x: "-100%", opacity: 0})
    .from("p", {opacity: 0}, "-=0.3")
    .from("h1", {opacity: 0, y: "30px"}, "-=0.3")
    .from("button", {opacity: 0, y: "-40px"}, "-=0.8")

  // function to restart animation
  const animate = () => tl.restart()

  // function to update trailValue based on slide value
  const trailUpdate = () => {
      if (value === 0) {
          trailValue = 0
      } else if (value === 20) {
          trailValue = 1
      } else if (value === 40) {
          trailValue = 2
      } else if (value === 60) {
          trailValue = 3
      } else {
          trailValue = 4
      }
  }   

  // Start interval for slides
  let start = setInterval(() => slide("increase"), interval)

  // Next  and  Previous button function (SVG icon with different classes)
  document.querySelectorAll("svg").forEach(cur => {
      // Assign function based on the class Name("next" and "prev")
      cur.addEventListener("click", () => cur.classList.contains("next") ? slide("increase") : slide("decrease"))
  })

  // function to slide when trail is clicked
  const clickCheck = (e) => {
      // CLear interval
      clearInterval(start)
      // remove active class from all trails
      trail.forEach(cur => cur.classList.remove("active"))
      // Get selected trail
      const check = e.target
      // add active class
      check.classList.add("active")

      // Update slide value based on the selected trail
      if(check.classList.contains("box1")) {
          value = 0
      } else if (check.classList.contains("box2")) {
          value = 20
      } else if (check.classList.contains("box3")) {
          value = 40
      } else if (check.classList.contains("box4")) {
          value = 60
      } else {
          value = 80
      }
      // update trail based on value
      trailUpdate()
      // transfrom slide
      move(value, trailValue)
      // start animation
      animate()
      // start interval
      start = setInterval(() => slide("increase"), interval)
  }

  // Add function to all trails
  trail.forEach(cur => cur.addEventListener("click", (ev) => clickCheck(ev)))

  // Mobile touch Slide Section
  const touchSlide = (() => {
      let start, move, change, sliderWidth

      // Do this on initial touch on screen
      slider.addEventListener("touchstart", (e) => {
          // get the touche position of X on the screen
          start = e.touches[0].clientX
          // (each slide with) the width of the slider container divided by the number of slides
          sliderWidth = slider.clientWidth/trail.length
      })
      
      // Do this on touchDrag on screen
      slider.addEventListener("touchmove", (e) => {
          // prevent default function
          e.preventDefault()
          // get the touche position of X on the screen when dragging stops
          move = e.touches[0].clientX
          // Subtract initial position from end position and save to change variabla
          change = start - move
      })

      const mobile = (e) => {
          // if change is greater than a quarter of sliderWidth, next else Do NOTHING
          change > (sliderWidth/4)  ? slide("increase") : null;
          // if change * -1 is greater than a quarter of sliderWidth, prev else Do NOTHING
          (change * -1) > (sliderWidth/4) ? slide("decrease") : null;
          // reset all variable to 0
          [start, move, change, sliderWidth] = [0,0,0,0]
      }
      // call mobile on touch end
      slider.addEventListener("touchend", mobile)
  })()
}
