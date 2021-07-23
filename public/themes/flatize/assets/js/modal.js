/**
 * Revisioned by Juri Fiorani after Created by Fabrizio Marconi on 10/11/2015.
 */
/**
 * @returns {Modal}
 * @constructor
 */
var Modal = function(selector) {

	if (!this instanceof Modal) {
		return new Modal()
	}

	if(selector === null || typeof selector === 'undefined') {
		selector = '#bsModal';
	}

	this.modal = $(selector);
	this.header = this.modal.find('.modal-header h4');
	this.body = this.modal.find('.modal-body');
	this.cancelButton = this.modal.find('.modal-footer .btn-default');
	this.okButton = this.modal.find('.modal-footer .btn-success');
};

/**
 * @param title
 */
Modal.prototype.setTitle = function(title) {
	this.header.html(title);
};

/**
 * @param text
 */
Modal.prototype.setOkButton = function(text) {
	this.okButton.html(text);
};

/**
 * @param text
 */
Modal.prototype.setCancelButton = function(text) {
	this.cancelButton.html(text);
};

/**
 * @param content
 */
Modal.prototype.setContent = function(content) {
	this.body.html(content);
};

Modal.prototype.appendContent = function(content) {
	this.body.append(content);
};

Modal.prototype.prependContent = function(content) {
	this.body.prepend(content);
};

Modal.prototype.hide = function() {
	this.modal.modal('hide');
};

Modal.prototype.show = function() {
	this.modal.modal('show');
};

Modal.prototype.blockModal = function () {
    this.modal.modal({
        backdrop: 'static',
        keyboard: false  // to prevent closing with Esc button (if you want this too)
    })
};

/**
 * @param dzConf
 * @returns {Modal}
 */
Modal.prototype.addDropZone = function(dzConf) {

	this.setContent('' +
		'<form id="dropzoneModal" class="dropzone" enctype="multipart/form-data" name="dropzonePhoto" action="POST">'+
		'<div class="fallback">'+
		'<input name="file" type="file" multiple />' +
		'</div>' +
		'</form>');

	this.dz = new Dropzone('#dropzoneModal', dzConf);

	return this;
};

Modal.prototype.attachDropZoneEvent = function(event, callback) {
	this.dz.on(event,callback);
};

Modal.prototype.detachDropZoneEvent = function(event) {
	this.dz.off(event);
};
