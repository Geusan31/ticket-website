import 'flowbite';
import './bootstrap';


window.onscroll = () => {
  console.log('scrolled')
  const nav = document.querySelector(".navbar")
  const div = nav.querySelector(".ticket")
  if (scrollY <= 200) div.className = 'hidden md:flex max-w-screen-xl flex-wrap items-center justify-end mx-auto p-4 md:px-16 md:py-4 mt-3 ticket'; else div.className = 'hidden md:flex max-w-screen-xl flex-wrap items-center justify-end mx-auto p-4 md:px-16 md:py-4 mt-3 ticket scrolled'
}