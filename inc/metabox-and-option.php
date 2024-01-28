<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  
    // Schedule metabox
    $prefix = 'eventmanage_schedule';
  
    // Schudule metabox
    CSF::createMetabox( $prefix, array(
      'title'     => 'Options',
      'post_type' => 'schedule',
      'date_type' => 'unserialize'
    ) );
  
    // Create a section
    CSF::createSection( $prefix,[
      'fields' => [
        // A text field
        [
            'id'    => 'date',
            'type'  => 'datetime',
            'title' => 'Date',
        ],
        [
            'id'    => 'start_date',
            'type'  => 'datetime',
            'title' => 'Start Date',
            'settings' => array(
                'noCalendar' => true,
                'enableTime' => true,
              ),
        ],
        [
            'id'    => 'end_date',
            'type'  => 'datetime',
            'title' => 'End Date',
            'settings' => array(
                'noCalendar' => true,
                'enableTime' => true,
              ),
        ],
        [
            'id'        => 'speakers',
            'type'      => 'group',
            'title'     => 'Skeapers',
            'fields'    =>[
              [
                'id'    => 'speaker',
                'type'  => 'select',
                'options' => 'post',
                'query_args' => [
                'post_type' => 'speaker',
                'posts_per_page' => -1
                ]
              ],
            ],
          ],
        [
            'id'        => 'materials',
            'type'      => 'group',
            'title'     => 'Materials',
            'fields'    =>[
              [
                'id'    => 'title',
                'type'  => 'text',
                'title' => 'Title',
                
              ],
              [
                'id'    => 'thumbnail',
                'type'  => 'media',
                'title' => 'Thumbnail',
                
              ],
              [
                'id'    => 'description',
                'type'  => 'textarea',
                'title' => 'Description',
                
              ],
              [
                'id'    => 'link',
                'type'  => 'link',
                'title' => 'Link',
                
              ],
            ],
          ],

      ]
    ] );

    // Person  metabox
    $prefix = 'eventmanage_person';
  
    // Person metabox
    CSF::createMetabox( $prefix, array(
      'title'     => 'Options',
      'post_type' => 'person',
      'date_type' => 'unserialize'
    ) );

    // Create a section
    CSF::createSection( $prefix,[
      'fields' => [
        // A text field
        [
            'id'    => 'type',
            'type'  => 'select',
            'title' => 'Type',
            'options'=> [
              'gust'=> 'Gust',
              'organier' => 'Organier',
              'volunteer' => 'Volunteer'
            ]
        ],
        
      ],

    ] );


    // Person && speaker  metabox
    $prefix = 'eventmanage_person_speaker';
  
    // Person metabox
    CSF::createMetabox( $prefix, array(
      'title'     => 'Extra Options',
      'post_type' => ['person','speaker'],
      'date_type' => 'unserialize'
    ) );

    // Create a section
    CSF::createSection( $prefix,[
      'fields' => [
        // A text field
        [
          'id'        => 'social_share',
          'type'      => 'group',
          'title'     => 'Social Share',
          'fields'    =>[
            [
              'id'    => 'icon',
              'type'  => 'icon',
              'title' => 'Icon',
              
            ],
            [
              'id'    => 'link',
              'type'  => 'text',
              'title' => 'Link',
              
            ],
          ],
        ],
        
      ],

    ] );


  
  }
  