<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Menú de Platos') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-card-list text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Catálogo de Comidas') }}</h6>
                                <p class="text-muted small">{{ __('Este es el corazón de tu menú. Aquí puedes ver todos los platos que ofreces, sus fotos, descripciones y precios.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-info-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-journal-text text-info fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Ver Receta') }}</h6>
                                <p class="text-muted small">{{ __('Pulsa "Ver Receta" para saber qué ingredientes lleva cada plato y en qué cantidades se utilizan.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-currency-dollar text-success fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Precios y Dificultad') }}</h6>
                                <p class="text-muted small">{{ __('Controla el precio de venta y el nivel de dificultad para que los cociners sepan la complejidad de la preparación.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-image text-warning fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Fotos Reales') }}</h6>
                                <p class="text-muted small">{{ __('Asegúrate de subir fotos atractivas. Una buena imagen ayuda al mesero a vender mejor el plato al cliente.') }}</p>
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
