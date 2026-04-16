<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Ingredientes') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-box-seam text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Control de Stock') }}</h6>
                                <p class="text-muted small">{{ __('Aquí puedes ver cuánto tienes de cada ingrediente. Si un número está en rojo o negativo, significa que te falta producto para completar pedidos.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-truck text-success fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Botón Surtir') }}</h6>
                                <p class="text-muted small">{{ __('Usa el botón azul "Surtir" cuando llegue nueva mercancía. Solo escribe la cantidad que llegó y el sistema la sumará al total automáticamente.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-pencil-square text-warning fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Editar Datos') }}</h6>
                                <p class="text-muted small">{{ __('Si el nombre o la unidad de medida (kg, lb, litros) están mal, usa el botón "Editar" para corregirlos.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-exclamation-octagon text-danger fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Gestión de Crisis') }}</h6>
                                <p class="text-muted small">{{ __('Si un ingrediente se agotó, el sistema bloqueará automáticamente la venta de platos que usen ese ingrediente hasta que surtas de nuevo.') }}</p>
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