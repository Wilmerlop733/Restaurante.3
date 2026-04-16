<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Recetas') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-egg-fried text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Composición del Plato') }}</h6>
                                <p class="text-muted small">{{ __('Aquí defines cuánta cantidad de cada ingrediente se gasta al preparar este plato. Es la "fórmula" de tu cocina.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-calculator text-warning fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Descuento Automático') }}</h6>
                                <p class="text-muted small">{{ __('Cuando un mesero vende un plato, el sistema mira esta receta y descuenta automáticamente los ingredientes del inventario.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-plus-circle text-success fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Crea tu Menú') }}</h6>
                                <p class="text-muted small">{{ __('Si agregas un ingrediente nuevo, asegúrate de asignarle la cantidad exacta (ej: 0.5 kg de carne) para que las cuentas sean precisas.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-trash-fill text-danger fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Eliminar con Cuidado') }}</h6>
                                <p class="text-muted small">{{ __('Si quitas un ingrediente de la receta, el sistema dejará de descontarlo del stock cuando se venda el plato.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">{{ __('Entendido') }}</button>
            </div>
        </div>
    </div>
</div>
