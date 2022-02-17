<?php

namespace App\Service\Database;

use App\Models\Clinic;
use App\Models\News;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class NewsService {
    public function index($clinicId, $filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;

        Clinic::findOrFail($clinicId);

        $query = News::orderBy('created_at', $orderBy);

        $query->where('clinic_id', $clinicId);

        $clinics = $query->paginate($per_page);

        return $clinics->toArray();
    }

    public function detail($newsId)
    {
        $news = News::findOrfail($newsId);

        return $news->toArray();
    }

    public function create($clinicId, $payload)
    {
        Clinic::findOrFail($clinicId);
        $news = new News();
        $news->id = Uuid::uuid4()->toString();
        $news->clinic_id = $clinicId;
        $news = $this->fill($news, $payload);
        $news->save();

        return $news;
    }

    public function update($clinicId, $newsId, $payload)
    {
        Clinic::findOrFail($clinicId);
        $news = News::findOrFail($newsId);
        $news = $this->fill($news, $payload);
        $news->save();

        return $news;
    }

    public function destroy($clinicId, $newsId)
    {
        Clinic::findOrFail($clinicId);

        News::findOrFail($newsId)->delete();

        return true;
    }

    private function fill(News $news, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $news->$key = $value;
        }

        Validator::make($news->toArray(), [
            'title' => 'required|string',
            'date' => 'required',
            'content' => 'required|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ])->validate();

        return $news;
    }
}
