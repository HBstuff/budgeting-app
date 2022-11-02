<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'date', 'category', 'description', 'user_id'];

    public function scopeFilter($query, array $filters) {

        if(($filters['filter-amount1'] ?? false)
            || ($filters['filter-amount2'] ?? false)
            || ($filters['filter-date1'] ?? false)
            || ($filters['filter-date2'] ?? false)
            || ($filters['filter-category'] ?? false)
            || ($filters['filter-description'] ?? false)
        )
        {
        
            $temp_filter_amount1 = request('filter-amount1');
            if($temp_filter_amount1 == 0 && request('filter-amount2')) {
                $temp_filter_amount1 = 0.01;
            }

            if($temp_filter_amount1 && request('filter-amount2')) {
                $query = $query->whereBetween('amount', [request('filter-amount1'), request('filter-amount2')]);
            }

            if(request('filter-date1') && request('filter-date2')) {
                $query = $query->whereBetween('date', [request('filter-date1'), request('filter-date2')]);
            }

            if(request('filter-category')) {
                $query = $query->where('category', 'like', request('filter-category'));
            }

            if(request('filter-description')) {
                $query = $query->where('description', 'like', '%' . request('filter-description') . '%');
            }

        }


        // SELECT category, SUM(amount) FROM transactions GROUP BY category;

        if(($filters['chart-start-date'] ?? false)
           || ($filters['chart-end-date'] ?? false)
           )
           {
            $query->whereBetween('date', [request('chart-start-date'), request('chart-end-date')])
                ->select(DB::raw('category, sum(amount) as category_sum'))
                ->groupBy('category');
        
            }
    }

    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
