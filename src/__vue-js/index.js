
import { FirstBlock } from './first-block';
import { SecondBlock } from './second-block';

const appsList = [
    [ 'first-block', FirstBlock ],
    [ 'second-block', SecondBlock ]
];

document.addEventListener("DOMContentLoaded", () => {
    
    appsList.map((_app) => {

        const viewElems = document.querySelectorAll('.' + _app[0]);
        
        Array.from(viewElems).map((viewElem) => {
            if(viewElem.id)
            {
                const App = Vue.createApp(_app[1]);
                App.mount("#" + viewElem.id);
            }
        });
        
    });
});
