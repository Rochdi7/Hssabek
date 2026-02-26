"use client";

import { Card } from "react-bootstrap";

const GoogleMapsWithInfoWindow = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Google Maps With InfoWindow</h4>
          <iframe
            src="https://www.google.com/maps/d/embed?mid=1rQt1Hl5N5hmUTaW5Gei3gsAii1o&amp;ehbc=2E312F"
            style={{
              border: "0",
              width: "100%",
              display: "block",
              height: "400px",
            }}
            allowFullScreen=""
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
          ></iframe>
        </Card.Body>
      </Card>
    </>
  );
};

export default GoogleMapsWithInfoWindow;
