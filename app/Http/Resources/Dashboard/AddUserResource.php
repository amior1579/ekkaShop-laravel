<?php
namespace App\Http\Resources\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class AddUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Username' => $this->username,
            'email' => $this->email,
            'status' => $this->status,
            'role' => $this->role,
        ];
    }
}
