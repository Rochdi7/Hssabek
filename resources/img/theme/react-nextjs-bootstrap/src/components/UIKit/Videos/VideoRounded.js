"use client";

import { Card, ProgressBar } from "react-bootstrap";

const VideoRounded = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Video Rounded</h4>
          
          <iframe src="https://www.youtube.com/embed/EOtPHxp6_Fg" title="YouTube video player" frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowFullScreen style={{ width: '100%', height: '500px', borderRadius: '20px' }}></iframe>
        </Card.Body>
      </Card>
    </>
  )
}

export default VideoRounded;