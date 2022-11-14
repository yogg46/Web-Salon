/*! landing.js | Huro | Css Ninja. 2020-2021 */
"use strict";$(document).ready((function(){var a=document.querySelectorAll("[data-lazy-load]");(lozad(a,{loaded:function(a){a.parentNode.classList.add("loaded")}}).observe(),$(window).on("scroll",(function(){$(window).scrollTop()>60?$(".landing-page-wrapper .navbar").removeClass("is-docked"):$(".landing-page-wrapper .navbar").addClass("is-docked")})),$("#night-toggle--daynight, #navbar-night-toggle--daynight").on("change",(function(){$(".landing-page-wrapper").toggleClass("is-dark"),"night-toggle--daynight"===$(this).attr("id")?!0===$(this).prop("checked")?$("#navbar-night-toggle--daynight").prop("checked",!1):$("#navbar-night-toggle--daynight").prop("checked",!0):!0===$(this).prop("checked")?$("#night-toggle--daynight").prop("checked",!1):$("#night-toggle--daynight").prop("checked",!0)})),"matchMedia"in window)&&window.matchMedia("(min-width: 1024px)").addEventListener("change",(function(a){a.matches&&$(".landing-page-wrapper .navbar-menu").hasClass("is-active")&&$(".landing-page-wrapper .navbar-burger").trigger("click")}));if($(".video-player").length)if("development"===env){$("[data-demo-poster]").each((function(){var a=$(this).attr("data-demo-poster");void 0!==a&&$(this).attr("data-poster",a)}));Array.from(document.querySelectorAll(".video-player")).map((function(a){return new Plyr(a)}))}else Array.from(document.querySelectorAll(".video-player")).map((function(a){return new Plyr(a)}));$(".landing-page-wrapper .navbar .nav-link").on("click",(function(){if($(".landing-page-wrapper .navbar .nav-link").removeClass("is-active"),$(this).addClass("is-active"),$(this).hasClass("is-scroll")){var a=$(this).attr("href");if(void 0!==a&&-1!==a.indexOf("#")){var e=a.split("#");console.log(e);var n=$("#"+e[1]);n.length&&$("html, body").animate({scrollTop:n.offset().top-50})}}$(".landing-page-wrapper .navbar-menu").hasClass("is-active")&&$(".landing-page-wrapper .navbar-burger").trigger("click")})),$(".landing-page-wrapper .navbar-burger").on("click",(function(){$(".landing-page-wrapper .navbar-menu").hasClass("is-active")?$(".landing-page-wrapper .navbar").removeClass("is-solid"):$(".landing-page-wrapper .navbar").addClass("is-solid"),$(".landing-page-wrapper .navbar-menu").toggleClass("is-active")})),initBackToTop()}));