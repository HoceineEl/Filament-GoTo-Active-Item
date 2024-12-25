<?php

namespace HoceineEl\Fab;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\HtmlString;

class FilamentGotoActiveItemPlugin implements Plugin
{
    protected int $timeout = 100;
    protected int $offset = 250;
    protected string $scrollBehavior = 'smooth';

    public static function make(): static
    {
        return app(static::class);
    }

    /**
     * Set the timeout delay before scrolling to the active item
     * This allows time for the DOM to update after navigation
     *
     * @param int $timeout Timeout in milliseconds
     */
    public function setTimeout(int $timeout): static
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * Set the offset from the top of the sidebar when scrolling
     * This controls how far from the top the active item will be positioned
     * 
     * @param int $offset Offset in pixels
     */
    public function setOffset(int $offset): static
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Set the scroll behavior animation style
     * Valid values are 'smooth' or 'auto'
     *
     * @param string $behavior Scroll behavior ('smooth'|'auto') 
     */
    public function setScrollBehavior(string $behavior): static
    {
        $this->scrollBehavior = $behavior;
        return $this;
    }

    public function getId(): string
    {
        return 'filament-goto-active-item';
    }

    public function register( $panel): void {}

    public function boot( $panel): void
    {
        FilamentView::registerRenderHook(
            'panels::scripts.before',
            fn() => new HtmlString("
                <script>
                    function scrollToActiveSidebarItem() {
                        setTimeout(() => {
                            const activeSidebarItem = document.querySelector('.fi-sidebar-item-active');
                            const sidebarWrapper = document.querySelector('.fi-sidebar-nav');
                            
                            if (!activeSidebarItem || !sidebarWrapper) return;
        
                            sidebarWrapper.style.scrollBehavior = '{$this->scrollBehavior}';
                            sidebarWrapper.scrollTo(0, activeSidebarItem.offsetTop - {$this->offset});
                        }, {$this->timeout});
                    }
                    document.addEventListener('livewire:navigated', scrollToActiveSidebarItem);
                </script>
            ")
        );
    }
}
