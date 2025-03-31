
//menu navigation
function toggleBarsMenu() {    
    var x = document.getElementById("mobileMenu");
    if (x.className === "header-mobile inactive") {
      x.className = "header-mobile";
    } else {
      x.className = "header-mobile inactive";
    }
  }

  //carrousel
  let nextButton = document.getElementById('next')
  let prevButton = document.getElementById('prev')
  let list = [].slice.call(document.querySelector('.container-slider').children)
  
  function findActiveList() {
    let activeList = list.findIndex((e) => {
      return e.classList.contains('active')
    })
    
    list[activeList].classList.remove('active', 'fadeInRight', 'fadeInLext', 'animated')
    
    return activeList
  }
  
  function slideShow() {
    let activeList = findActiveList()
    
    activeList++
    activeList = activeList === list.length ? 0 : activeList
    
    list[activeList].classList.add('active', 'fadeInRight', 'animated')
  }
  
  setInterval(slideShow, 5000)
  
  nextButton.addEventListener('click', slideShow)
  
  prevButton.addEventListener('click', () => {
    let activeList = findActiveList()
    
    activeList--
    activeList = activeList === -1 ? list.length - 1 : activeList
    
    list[activeList].classList.add('active', 'fadeInLeft', 'animated')
  })