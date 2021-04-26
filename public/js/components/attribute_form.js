"use strict"

var AttributeForm = function () {
    var radioBtnOnClick = function () {
        var radioBtns = $("input[type='radio']");

        radioBtns.each(function () {
            toggleValuesDiv($(this));
        });

        radioBtns.click(function () {
            toggleValuesDiv($(this))
        });
    }

    var toggleValuesDiv = function (radioBtn) {
        var type = radioBtn.val();
        var valuesDive =  $("#valuesDiv");

        if (type != 'size' && type != 'list'){
            valuesDive.fadeOut();
        }else{

            if(radioBtn.is(":checked")){
                valuesDive.fadeIn();
            }

        }
    }

    var tagifyInput = function() {
        var input = document.getElementById('values'),
            // init Tagify script on the above inputs
            tagify = new Tagify(input, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            })



        // "remove all tags" button event listener
        document.getElementById('kt_tagify_1_remove').addEventListener('click', tagify.removeAllTags.bind(tagify))

        // Chainable event listeners
        tagify.on('add', onAddTag)
            .on('remove', onRemoveTag)
            .on('input', onInput)
            .on('edit', onTagEdit)
            .on('invalid', onInvalidTag)
            .on('click', onTagClick)
            .on('dropdown:show', onDropdownShow)
            .on('dropdown:hide', onDropdownHide)

        // tag added callback
        function onAddTag(e) {
            console.log("onAddTag: ", e.detail);
            console.log("original input value: ", input.value)
            tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
        }

        // tag remvoed callback
        function onRemoveTag(e) {
            console.log(e.detail);
            console.log("tagify instance value:", tagify.value)
        }

        // on character(s) added/removed (user is typing/deleting)
        function onInput(e) {
            console.log(e.detail);
            console.log("onInput: ", e.detail);
        }

        function onTagEdit(e) {
            console.log("onTagEdit: ", e.detail);
        }

        // invalid tag added callback
        function onInvalidTag(e) {
            console.log("onInvalidTag: ", e.detail);
        }

        // invalid tag added callback
        function onTagClick(e) {
            console.log(e.detail);
            console.log("onTagClick: ", e.detail);
        }

        function onDropdownShow(e) {
            console.log("onDropdownShow: ", e.detail)
        }

        function onDropdownHide(e) {
            console.log("onDropdownHide: ", e.detail)
        }

    }

    return {
        init: function () {
            radioBtnOnClick();
            tagifyInput();
        }
    }
}

$(function () {

    AttributeForm().init();
});

