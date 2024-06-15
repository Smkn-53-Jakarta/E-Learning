<div class="symbol-group symbol-hover">
    @if ($thereIsMe)
        @if (!$thereIsMe->image)
            <div class="symbol symbol-25px symbol-circle" data-bs-toggle="tooltip" title="Saya">
                <span class="symbol-label bg-primary text-inverse-primary fw-bold">{{ auth()->user()->name }}</span>
            </div>
        @else
            <a href="" class="symbol symbol-25px symbol-circle" data-bs-toggle="tooltip" title="Saya">
                <img alt="Image" src="{{ FileHelper::getImage('users/images/' . auth()->user()->image) }}" />
            </a>
        @endif
    @endif
    @foreach ($limitMember as $member)
        @if (!$member->user->profile_picture)
            <div class="symbol symbol-25px symbol-circle" data-bs-toggle="tooltip"
                title="{{ $member->user->name == auth()->user()->name ? 'saya' : $member->user->name }}">
                <span class="symbol-label bg-primary text-inverse-primary fw-bold">{{ $member->user->name }}</span>
            </div>
        @else
            <span class="symbol symbol-25px symbol-circle" data-bs-toggle="tooltip" title="{{ $member->user->name }}">
                <img alt="Image"
                    src="{{ FileHelper::getImage('users/images/' . $member->user->profile_picture) }}" />
            </span>
        @endif
    @endforeach
    @if ($overMembers > 0)
        <a href="javascript:void(0)" class="symbol symbol-25px symbol-circle" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bold" data-bs-toggle="tooltip"
                data-bs-trigger="hover" title="View more users">{{ $overMembers }}</span>
        </a>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anggota Ekstrakurikuler</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-0">
                            @foreach ($members as $member)
                                <div class="d-flex flex-stack">
                                    <div class="d-flex align-items-center me-5">
                                        <span class="symbol symbol-25px symbol-circle me-3" data-bs-toggle="tooltip"
                                            title="{{ $member->user->name }}">
                                            <img alt="Image"
                                                src="{{ FileHelper::getImage('users/images/' . $member->user->profile_picture) }}" />
                                        </span>
                                        <div class="me-5">
                                            <span
                                                class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $member->user->name }}</span>
                                            <span
                                                class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">{{ $member->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-3"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
