#!/bin/bash

# Function to add connection and modify migration methods
modify_migration() {
  local connection=$1
  local path=$2

  for file in $path/*.php; do
    if [[ -f $file ]]; then
      # Insert the protected $connection line after the class declaration
      sed -i "/^class /a\    protected \$connection = '$connection'; // Specify the $connection connection" "$file"

      # Modify the up method to use Schema::connection()
      sed -i "/public function up()/a\        Schema::connection(\$this->connection)->create('table_name', function (Blueprint \$table) {" "$file"
      sed -i "/create('table_name', function (Blueprint \$table) {/a\            \$table->id();\n            \$table->string('description');" "$file"
      sed -i "/^\s*}\s*$/a\        });" "$file"

      # Modify the down method to use Schema::connection()
      sed -i "/public function down()/a\        Schema::connection(\$this->connection)->dropIfExists('table_name');" "$file"
    fi
  done
}

# Generate migrations for MySQL database
php artisan migrate:generate --connection=mysql --path=database/migrations
# Modify migration files for MySQL
modify_migration 'mysql' 'database/migrations'

# Generate migrations for CRM database
php artisan migrate:generate --connection=crm --path=database/migrations/crm
# Modify migration files for CRM
modify_migration 'crm' 'database/migrations/crm'

# Generate migrations for Marketplace database
php artisan migrate:generate --connection=marketplace --path=database/migrations/marketplace
# Modify migration files for Marketplace
modify_migration 'marketplace' 'database/migrations/marketplace'
