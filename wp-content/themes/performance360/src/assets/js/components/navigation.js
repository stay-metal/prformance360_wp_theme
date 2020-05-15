import $ from 'jquery';

$('.c-main-navigation').on('mouseenter','.menu-item-has-children', (e) => {
    $(e.currentTarget).addClass('open');    
})
$('.c-main-navigation').on('mouseleave','.menu-item-has-children', (e) => {
    $(e.currentTarget).removeClass('open');    
})

// mobile search
const mobileSearchTrigger = document.querySelector('.mobile-search__trigger');
const mobileSearchForm = document.querySelector('.mobile-search__form');

if (mobileSearchTrigger && mobileSearchForm) {
    mobileSearchTrigger.onclick = (event) => {
        const el = event.target;
        if (el.dataset.open === 'false') {
            el.dataset.open = true;
            mobileSearchForm.classList.add('open');

        } else {
            el.dataset.open = false;
            mobileSearchForm.classList.remove('open');
        }
    }
}

const viewMoreInMenu = () => {
    // Hide overflowing menu elements behind "More"
    const desktopMainMenuContainer = document.querySelector('.c-main-navigation--desktop');

    if (desktopMainMenuContainer && desktopMainMenuContainer.offsetParent !== null) {
        const menuItemsContainer = desktopMainMenuContainer.querySelector('#menu-main-menu');
        const menuItems = menuItemsContainer.querySelectorAll('li');
    
        const menuWidthThreshold = 800;
        const menusArrays = {
            'visible': [],
            'hidden': []
        };
    
        let accWidth = 0;
        menuItems.forEach(el => {
            accWidth += el.offsetWidth;
            if (accWidth < menuWidthThreshold) {
                menusArrays['visible'].push(el);
            } else {
                menusArrays['hidden'].push(el);
            }
        });
    
        menuItemsContainer.innerHTML = '';
        Object.keys(menusArrays).forEach(key => {
            if (!key) {
                return;
            }
        
            if (key === 'visible') {
                menusArrays[key].forEach(el => {
                    menuItemsContainer.appendChild(el);
                })
            } else {
                const moreEl = document.querySelector('.js_more-element');
                if (!moreEl) {
                    return;
                }
                moreEl.style.display = 'block';
                const menusHolder = document.createElement('ul');
                moreEl.appendChild(menusHolder);
                moreEl.style.position = 'relative';
    
                menusArrays[key].forEach(el => {
                    menusHolder.appendChild(el);
                });
                menusHolder.classList.add('main-dropdown-menu');
                menuItemsContainer.appendChild(moreEl);
    
                moreEl.addEventListener('mouseenter', e => {
                    menusHolder.style.visibility = 'visible';
                    menusHolder.style.opacity = '1';
                });
    
                moreEl.addEventListener('mouseleave', e => {
                    menusHolder.style.visibility = 'hidden';
                    menusHolder.style.opacity = '0';
                });
               
            }
        });
    }
}

viewMoreInMenu();

window.onresize = () => {
    viewMoreInMenu();
}