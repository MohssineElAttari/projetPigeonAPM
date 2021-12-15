$(function () {
    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 500,
        onStepChanging: function (event, currentIndex, newIndex) {
            if (newIndex === 1) {
                $('.steps ul').addClass('step-2');
            } else {
                $('.steps ul').removeClass('step-2');
            }
            if (newIndex === 2) {
                $('.steps ul').addClass('step-last');
            } else {
                $('.steps ul').removeClass('step-last');
            }
            return true
        },
        labels: {
            finish: "Fini",
            next: "Suivi",
            previous: "Retour"
        },

        onFinishing: function (event, currentIndex) {
            $('#form-register').submit()
        },
    });
    // Custom Steps Jquery Steps
    $('.wizard > .steps li a').click(function () {
        $(this).parent().addClass('checked');
        $(this).parent().prevAll().addClass('checked');
        $(this).parent().nextAll().removeClass('checked');
    });
    // Custom Button Jquery Steps
    $('.forward').click(function () {
        $("#wizard").steps('next');
    })
    $('.backward').click(function () {
        $("#wizard").steps('previous');
    })
    // Checkbox
    $('.checkbox-circle label').click(function () {
        $('.checkbox-circle label').removeClass('active');
        $(this).addClass('active');
    })
})
const box = document.querySelector('.box');
for (const child of box.children) {
    child.addEventListener('click', function (e) {
        console.log(e.target.textContent);
        document.getElementById('type_reg').value = e.target.textContent;
        document.querySelector('.model').classList.add('hidden');
    })
}
