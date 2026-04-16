<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Toma de Pedidos') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-info-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-cart-check text-info fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Selección de Platos') }}</h6>
                                <p class="text-muted small">{{ __('Busca el plato que el cliente desea. Verás la foto, descripción y el precio unitario para informar al cliente.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-plus-slash-minus text-success fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Ajustar Cantidad') }}</h6>
                                <p class="text-muted small">{{ __('Usa el recuadro de cantidad para indicar cuántas porciones quiere el cliente. El sistema calculará el total automáticamente.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-lightning-charge text-warning fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Envío del Pedido') }}</h6>
                                <p class="text-muted small">{{ __('Al pulsar "SOLICITAR PEDIDO", el sistema verifica si hay stock suficiente en cocina y registra la venta de inmediato.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-exclamation-triangle text-danger fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Errores de Stock') }}</h6>
                                <p class="text-muted small">{{ __('Si te aparece un mensaje en rojo, es que no hay suficientes ingredientes. Avisa al cliente que ese plato no está disponible temporalmente.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-info text-white px-4" data-bs-dismiss="modal">{{ __('Entendido') }}</button>
            </div>
        </div>
    </div>
</div>
