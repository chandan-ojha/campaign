import os

# Specify the directory path where the files are located
directory_path = "./images/test-12/"

# Get a list of all files in the directory
file_list = os.listdir(directory_path)

# Initialize a counter for the sequence
sequence_counter = 1

# Iterate through the files and rename them in the desired sequence
for filename in file_list:
    # Check if the item is a file (not a directory)
    if os.path.isfile(os.path.join(directory_path, filename)):
        # Get the file extension
        file_extension = os.path.splitext(filename)[1]
        
        # Create the new file name with the sequence number
        new_filename = f"frame_12_img_{sequence_counter}{file_extension}"
        
        # Construct the full path for the old and new file names
        old_filepath = os.path.join(directory_path, filename)
        new_filepath = os.path.join(directory_path, new_filename)
        
        # Rename the file
        os.rename(old_filepath, new_filepath)
        print(f"Renamed: {filename} to {new_filename}")
        
        # Increment the sequence counter
        sequence_counter += 1
