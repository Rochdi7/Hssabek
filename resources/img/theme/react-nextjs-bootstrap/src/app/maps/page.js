"use client";

import { Row, Col, Breadcrumb } from "react-bootstrap";
import BasicGoogleMap from '@/components/Maps/BasicGoogleMap';
import GoogleMapsWithMarker from '@/components/Maps/GoogleMapsWithMarker';
import GoogleMapsWithSatellite from '@/components/Maps/GoogleMapsWithSatellite';
import GoogleMapsWithInfoWindow from '@/components/Maps/GoogleMapsWithInfoWindow';
import MapRounded from '@/components/Maps/MapRounded';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Maps</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>
          <Breadcrumb.Item active>
            <span className="fw-medium">Maps</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col lg={6}>
          <BasicGoogleMap />

          <GoogleMapsWithSatellite /> 
        </Col>

        <Col lg={6}>
         <GoogleMapsWithMarker />

         <GoogleMapsWithInfoWindow />
        </Col>
      </Row>

      <MapRounded />
    </>
  );
}
