module.exports = (grunt) ->
  grunt.initConfig
    pkg: grunt.file.readJSON("package.json")

    watch:
      options: nospawn: true
      # watch the php folder and run the copy task
      php:
        files: ["app/**/*"]
        tasks: ["copy:main"]
      # watch the css folder and run the sass task
    clean:
      build:
        src: ["dist/"]

    copy:
      main:
        dot: true
        expand: true
        cwd:  "app"
        src:  ["**"]
        dest: "dist/"
      activerecord:
        expand: true
        cwd:  "libs/php-activerecord"
        src:  ["ActiveRecord.php", "lib/**/*" ]
        dest: "dist/includes/php-activerecord"
      slim:
        expand: true
        cwd:  "libs/slim/Slim"
        src:  ["**"]
        dest: "dist/includes/Slim"

  grunt.loadNpmTasks "grunt-contrib-clean"
  grunt.loadNpmTasks "grunt-contrib-copy"
  grunt.loadNpmTasks "grunt-contrib-watch"

  grunt.registerTask "default", [
    "clean"
    "copy"
    "watch"
  ]
