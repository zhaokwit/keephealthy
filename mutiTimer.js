
    var addTimer = function () {     
        var list = [],     
            interval;     
    
        return function (id, time) {     
            if (!interval)     
                interval = setInterval(go, 1000);     
            list.push({ ele: document.getElementById(id), time: time });     
        }     
    
        function go() {     
            for (var i = 0; i < list.length; i++) {     
                list[i].ele.innerHTML = getTimerString(list[i].time ? list[i].time -= 1 : 0);     
                if (!list[i].time)     
                    list.splice(i--, 1);     
            }     
        }     
    
        function getTimerString(time) {     
                d = Math.floor(time / 86400),     
                h = Math.floor((time % 86400) / 3600),     
                m = Math.floor(((time % 86400) % 3600) / 60),     
                s = Math.floor(((time % 86400) % 3600) % 60);     
            if (time>0)     
                return  "Food name: "+ m + "m" + ":" + s + "s";       
            else return "Your food is ready to eat! Enjoy :)";     
        }     
    } ();     
    
    addTimer("timer1", 5);     
    addTimer("timer2", 8);     
    addTimer("timer3", 3);