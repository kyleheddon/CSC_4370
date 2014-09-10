#!/usr/bin/env ruby

def directory_contains_file_type?(ext)
  `ls | grep .#{ext}` != ''
end

whitelisted_file_types = %w(html ico txt)
file_types_to_copy = []

whitelisted_file_types.each do |ext|
  file_types_to_copy << ext if directory_contains_file_type?(ext)
end

wildcard_files = file_types_to_copy.map{|t|'*.'+t}.join(' ')

`scp -r assets/ #{wildcard_files} csc4370FA14_59@codd.cs.gsu.edu:~/public_html/`
