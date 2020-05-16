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

const desktopMainMenuContainer = document.querySelector('.c-main-navigation--desktop');
const menuItemsContainer = desktopMainMenuContainer.querySelector('#menu-main-menu');
const menuItems = menuItemsContainer.querySelectorAll('li');

let itemsWidths = 0;
if (menuItems && menuItems.length) {
    itemsWidths = Array.from(menuItems).map(el => {
        return {
            width: el.getBoundingClientRect().width,
            el
        }
    });
}

const viewMoreInMenu = () => {
    // Hide overflowing menu elements behind "More"
    const existingMore = document.querySelector('.js_more-element');
    const mainNavEl = document.querySelector('.js_main-nav');
    const shouldRun = desktopMainMenuContainer &&
        mainNavEl;

    if (existingMore) {
        existingMore.remove();
    }

    if (shouldRun) {
        const menuWidthThreshold = mainNavEl.getBoundingClientRect().width - 300;
        const menusArrays = {
            'visible': [],
            'hidden': []
        };
    
        let accWidth = 0;
        itemsWidths.forEach(elObj => {
            accWidth += elObj.width;
            if (accWidth < menuWidthThreshold) {
                menusArrays['visible'].push(elObj.el);
            } else {
                menusArrays['hidden'].push(elObj.el);
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
                if (menusArrays[key].length < 1) {
                    return;
                }
                const moreEl = document.createElement('li');
                moreEl.classList.add('menu-item', 'js_more-element');
                const textLink = document.createElement('a');
                textLink.onclick = e => e.preventDefault();
                const chevron = document.createElement('i');
                chevron.classList.add('fas', 'fa-chevron-down');
                const text = document.createTextNode('Еще');
                textLink.appendChild(text);
                textLink.appendChild(chevron);
                moreEl.appendChild(textLink);


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

window.addEventListener('resize', () => {
    viewMoreInMenu();
});