<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Categorías') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-tags text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Organización del Menú') }}</h6>
                                <p class="text-muted small">{{ __('Agrupa tus platos por tipo (ej: Entradas, Carnes, Bebidas). Esto hace que el menú sea más fácil de leer para el cliente y el mesero.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-info-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-person-badge text-info fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Encargados') }}</h6>
                                <p class="text-muted small">{{ __('Puedes asignar un encargado a cada categoría (ej: Barman para bebidas, Chef para cocina caliente) para llevar un mejor control.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-search text-success fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Filtro Rápido') }}</h6>
                                <p class="text-muted small">{{ __('Al pulsar "Ver Platos", verás solamente los productos que pertenecen a esa categoría específica.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm guia-icon-circle">
                                <i class="bi bi-pencil-square text-warning fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ __('Mantenimiento') }}</h6>
                                <p class="text-muted small">{{ __('Si cambias el nombre de una categoría, todos los platos asociados se actualizarán automáticamente en el sistema.') }}</p>
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
