const parEle = document.getElementById("ideas");
const AddBtn = document.getElementById("add_idea");

AddBtn.addEventListener("click", function () {
    let eleIdea = document.createElement("div");
    eleIdea.className = "idea";

    /* sectionIdea */
    let sectionIdea = document.createElement("div");
    sectionIdea.className = "section_idea";

    let idea = document.createElement("span");
    let textIdea = document.createTextNode("Idea");
    idea.appendChild(textIdea);

    let inpIdea = document.createElement("input");
    inpIdea.className = "form-control form-control-lg form-control-solid";
    inpIdea.setAttribute("type", "text");

    sectionIdea.append(idea, inpIdea);
    /* /////////sectionIdea */

    /* sectionSyllabus */
    let sectionSyllabus = document.createElement("div");
    sectionSyllabus.className = "section_syllabus";

    let syllabus = document.createElement("span");
    let textSyllabus = document.createTextNode("Syllabus");
    syllabus.appendChild(textSyllabus);

    let inpSyllabus = document.createElement("input");
    inpSyllabus.className = "form-control form-control-lg form-control-solid";
    inpSyllabus.setAttribute("type", "text");

    sectionSyllabus.append(syllabus, inpSyllabus);
    /* ////sectionSyllabus */

    /* sectionPdf */
    let sectionPdf = document.createElement("div");
    sectionPdf.className = "section_pdf";

    let pdf = document.createElement("span");
    let textPdf = document.createTextNode("Pdf");
    pdf.appendChild(textPdf);

    let inpPdf = document.createElement("input");
    inpPdf.setAttribute("type", "file");

    sectionPdf.append(pdf, inpPdf);
    /* ////sectionPdf */

    /* sectionVideoLink */
    let sectionVideoLink = document.createElement("div");
    sectionVideoLink.className = "section_video_link";

    let videoLink = document.createElement("span");
    let textVideoLink = document.createTextNode("Video Link");
    videoLink.appendChild(textVideoLink);

    let inpVideoLink = document.createElement("input");
    inpVideoLink.className = "form-control form-control-lg form-control-solid";
    inpVideoLink.setAttribute("type", "text");

    sectionVideoLink.append(videoLink, inpVideoLink);
    /* ////sectionVideoLink */

    /* sectionBtnAdd */
    let sectionBtnAdd = document.createElement("div");
    sectionBtnAdd.className = "section_add_idea";

    let btnAdd = document.createElement("button");

    function setAttributes(element, attributes) {
        Object.keys(attributes).forEach((attr) => {
            element.setAttribute(attr, attributes[attr]);
        });
    }
    const attrib = {
        type: "button",
        id: "add_idea",
        onclick: "remove(this)",
    };
    let textBtnAdd = document.createTextNode("Remove Idea");
    btnAdd.className =
        "btn_add btn btn-lg btn-primary d-inline-block bt-remove";
    btnAdd.idName = "section_add_idea";
    setAttributes(btnAdd, attrib);
    btnAdd.appendChild(textBtnAdd);

    sectionBtnAdd.appendChild(btnAdd);
    /* ////sectionBtnAdd */

    eleIdea.append(
        sectionIdea,
        sectionSyllabus,
        sectionPdf,
        sectionVideoLink,
        sectionBtnAdd
    );
    parEle.appendChild(eleIdea);
});
const btnRemove = document.querySelector(".bt-remove");
function remove(e) {
       //     e.parentNode.removeChild(e);
       (e.parentNode).parentNode.remove(e)
};
// btnRemove.
