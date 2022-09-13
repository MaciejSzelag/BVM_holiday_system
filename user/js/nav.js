
const checkNavBar = () => {
    const lines = document.getElementsByClassName('line-wrap').length > 0;
    const menu = document.getElementsByClassName('service-wrap').length > 0;
    if (lines && menu) {
        
        const line_wrap = document.querySelector(".line-wrap");
        const service_wrap = document.querySelector(".service-wrap");
        
        line_wrap.addEventListener("click", () => {
            line_wrap.classList.toggle("line-wrap-active");
            service_wrap.classList.toggle("service-wrap-active");
        })

    }

}
checkNavBar();

