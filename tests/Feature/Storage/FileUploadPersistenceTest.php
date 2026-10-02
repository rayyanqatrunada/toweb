<?php

namespace Tests\Feature\Storage;

use App\Models\Facility;
use App\Models\Setting;
use App\Models\Teacher;
use App\Models\User;
use App\Filament\Resources\Teachers\Pages\EditTeacher;
use App\Filament\Resources\Facilities\Pages\EditFacility;
use App\Filament\Pages\ManagePageHeaders;
use App\Filament\Pages\ManageSettings;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class FileUploadPersistenceTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
        
        $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $this->user = User::factory()->create();
        $this->user->assignRole($role);
        
        $this->actingAs($this->user);
        Filament::setCurrentPanel(Filament::getPanel('admin'));
    }

    public function test_teacher_photo_replacement_persists_to_database(): void
    {
        $oldFile = UploadedFile::fake()->image('old_guru.jpg', 300, 300);
        $oldPath = $oldFile->store('teachers', 'public');

        $teacher = Teacher::create([
            'user_id' => $this->user->id,
            'name' => 'Pak Budi Hartono',
            'position' => 'Instruktur Utama',
            'photo' => $oldPath,
            'is_head_of_department' => false,
            'is_active' => true,
        ]);

        $newFile = UploadedFile::fake()->image('new_guru.jpg', 400, 400);

        Livewire::test(EditTeacher::class, ['record' => $teacher->getRouteKey()])
            ->set('data.photo', $newFile)
            ->call('save')
            ->assertHasNoFormErrors()
            ->assertRedirect();

        $teacher->refresh();

        $this->assertNotNull($teacher->photo);
        $this->assertNotEquals($oldPath, $teacher->photo);
        $this->assertStringStartsWith('teachers/', $teacher->photo);
        Storage::disk('public')->assertExists($teacher->photo);
    }

    public function test_facility_photo_replacement_persists_to_database(): void
    {
        $oldFile = UploadedFile::fake()->image('old_facility.jpg', 300, 300);
        $oldPath = $oldFile->store('facilities', 'public');

        $facility = Facility::create([
            'name' => 'Bengkel Pit Uji',
            'slug' => 'bengkel-pit-uji',
            'category' => 'tefa_workshop',
            'condition' => 'good',
            'quantity' => 2,
            'photo' => $oldPath,
        ]);

        $newFile = UploadedFile::fake()->image('new_facility.jpg', 600, 400);

        Livewire::test(EditFacility::class, ['record' => $facility->getRouteKey()])
            ->set('data.photo', $newFile)
            ->call('save')
            ->assertHasNoFormErrors()
            ->assertRedirect();

        $facility->refresh();

        $this->assertNotNull($facility->photo);
        $this->assertNotEquals($oldPath, $facility->photo);
        $this->assertStringStartsWith('facilities/', $facility->photo);
        Storage::disk('public')->assertExists($facility->photo);
    }

    public function test_page_header_image_replacement_persists_to_settings(): void
    {
        Setting::updateOrCreate(
            ['key' => 'header_about_image'],
            ['value' => 'facilities/old-header.png']
        );

        $newFile = UploadedFile::fake()->image('new_about_header.jpg', 1200, 600);

        Livewire::test(ManagePageHeaders::class)
            ->set('data.header_about_image', $newFile)
            ->call('save')
            ->assertHasNoErrors();

        $val = Setting::where('key', 'header_about_image')->value('value');
        $this->assertNotNull($val);
        $this->assertNotEquals('facilities/old-header.png', $val);
        $this->assertStringStartsWith('headers/', $val);
        Storage::disk('public')->assertExists($val);
    }

    public function test_manage_settings_logo_replacement_persists(): void
    {
        $this->seed(\Database\Seeders\SettingSeeder::class);

        Setting::updateOrCreate(
            ['key' => 'site_logo'],
            ['value' => 'settings/old-logo.png']
        );

        $newLogo = UploadedFile::fake()->image('brand_new_logo.png', 200, 200);

        Livewire::test(ManageSettings::class)
            ->set('data.site_logo', $newLogo)
            ->call('save')
            ->assertHasNoErrors();

        $val = Setting::where('key', 'site_logo')->value('value');
        $this->assertNotNull($val);
        $this->assertNotEquals('settings/old-logo.png', $val);
        $this->assertStringStartsWith('settings/', $val);
        Storage::disk('public')->assertExists($val);
    }
}
