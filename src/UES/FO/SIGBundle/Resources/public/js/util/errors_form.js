define(function() {
    return {
        controlReset: function(prefix, control) {
            var selector = '[for="' + prefix + '_' + control + '"]';
            var group = document.querySelector(selector).parentNode;
            group.className = group.className.replace('has-error', '');
            var div = document.querySelector(selector + '+ div');
            var uls = document.querySelectorAll(selector + ' + div > .help-block');
            for(i=0; i<uls.length; i++) {
                div.removeChild(uls[i]);
            }
        },
        controlError: function(prefix, control, errors) {
            this.controlReset(prefix, control);
            var selector = '[for="' + prefix + '_' + control + '"]';
            var group = document.querySelector(selector).parentNode;
            group.className = group.className + ' has-error';
            var ul = document.createElement('ul');
            ul.className = 'help-block';
            for(i=0; i<errors.length; i++) {
                var li = document.createElement('li');
                li.innerText = errors[i];
                ul.appendChild(li);
            }
            group.querySelector('div').appendChild(ul);
        },
        resetAll: function() {
            var uls = document.querySelectorAll('.has-error .help-block');
            for(i=0; i<uls.length; i++) {
                var div = uls[i].parentNode;
                div.removeChild(uls[i]);
            }
            var controls = document.querySelectorAll('.has-error');
            for(j=0; j<controls.length; j++) {
                var cl = controls[j].className.replace(' has-error', '');
                controls[j].className = cl;
            }
            var alert = document.querySelector('.alert');
            if(alert) {
                document.querySelector('form > div').removeChild(alert);
            }
        },
        errorAll: function(prefix, msg) {
            this.resetAll();
            if(msg.errors) {
                var formContent = document.getElementById(prefix);
                formContent.appendChild(this.alertMsg(msg.errors));
            }
            if(msg.childrens) {
                for(control in msg.childrens) {
                    this.controlError(prefix, control, msg.childrens[control].errors);
                }
            }
        },
        alertMsg: function(errors) {
            var alert = document.createElement('div');
            alert.className = 'alert alert-danger';
            var ul = document.createElement('ul');
            for(i=0; i<errors.length; i++) {
                var li = document.createElement('li');
                li.textContent = errors[i];
                ul.appendChild(li);
            }
            alert.appendChild(ul);
            return alert;
        }
    };
});
