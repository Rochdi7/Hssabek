"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import BasicRangeAreaChart from '@/components/Charts/MoreCharts/BasicRangeAreaChart';
import BasicTimelineChart from '@/components/Charts/MoreCharts/BasicTimelineChart';
import BasicCandlestickChart from '@/components/Charts/MoreCharts/BasicCandlestickChart';
import BasicBoxplotChart from '@/components/Charts/MoreCharts/BasicBoxplotChart';
import BasicScatterChart from '@/components/Charts/MoreCharts/BasicScatterChart';
import BasicTreemapChart from '@/components/Charts/MoreCharts/BasicTreemapChart';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">More Charts</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">Charts</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">More Charts</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>
 
      <Row>
        <Col lg={6}>
          <BasicRangeAreaChart />

          <BasicCandlestickChart />

          <BasicScatterChart />
        </Col>

        <Col lg={6}> 
          <BasicTimelineChart />

          <BasicBoxplotChart />

          <BasicTreemapChart />
        </Col> 
      </Row> 
    </>
  );
}
