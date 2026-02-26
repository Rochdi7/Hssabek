"use client";
      
import { Row, Col, Breadcrumb } from "react-bootstrap";
import RevenueGrowth from '@/components/Widgets/RevenueGrowth';
import LeadConversion from '@/components/Widgets/LeadConversion';
import TotalOrders from '@/components/Widgets/TotalOrders';
import AnnualProfit from '@/components/Widgets/AnnualProfit';
import TicketsResolved from '@/components/Widgets/TicketsResolved';
import TicketsInProgress from '@/components/Widgets/TicketsInProgress';
import TicketsDue from '@/components/Widgets/TicketsDue';
import TicketsNewOpen from '@/components/Widgets/TicketsNewOpen';
import Welcome from '@/components/Widgets/Welcome';
import TotalCourses from '@/components/Widgets/TotalCourses';
import TotalEnrolled from '@/components/Widgets/TotalEnrolled';
import TotalMentors from '@/components/Widgets/TotalMentors';
import TotalCustomers from '@/components/Widgets/TotalCustomers';
import TotalRevenue from '@/components/Widgets/TotalRevenue';
import TopOrders from '@/components/Widgets/TopOrders';
import ProjectsOverview from '@/components/Widgets/ProjectsOverview';
import ProjectsRoadmap from '@/components/Widgets/ProjectsRoadmap';
import CoursesSales from '@/components/Widgets/CoursesSales';
import TimeSpent from '@/components/Widgets/TimeSpent';
import OurTopCourses from '@/components/Widgets/OurTopCourses';
import ProjectAnalysis from '@/components/Widgets/ProjectAnalysis';
import TeamMembers from '@/components/Widgets/TeamMembers';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Widgets</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>
 
          <Breadcrumb.Item active>
            <span className="fw-medium">Widgets</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col md={6} lg={6} xl={6} xxl={3}>
          <RevenueGrowth />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={3}>
          <LeadConversion />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={3}>
          <TotalOrders />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={3}>
          <AnnualProfit />
        </Col>
      </Row>

      <Row>
        <Col md={6} lg={6} xl={6} xxl={3}>
          <TicketsResolved />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={3}>
          <TicketsInProgress />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={3}>
          <TicketsDue />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={3}>
          <TicketsNewOpen />
        </Col>
      </Row>
      
      <Row className="justify-content-center">
        <Col xs={12} lg={12} xl={12} xxl={6}>
          <Welcome />
        </Col>

        <Col xs={12} sm={6} lg={4} xl={4} xxl={2}>
          <TotalCourses />
        </Col>

        <Col xs={12} sm={6} lg={4} xl={4} xxl={2}>
          <TotalEnrolled />
        </Col>

        <Col xs={12} sm={6} lg={4} xl={4} xxl={2}>
          <TotalMentors />
        </Col>
      </Row>

      <Row className="justify-content-center">
        <Col md={6} lg={6} xl={6} xxl={4}>
          <TotalCustomers />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={4}>
          <TotalRevenue />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={4}>
          <TopOrders />
        </Col>
      </Row>

      <Row>
        <Col lg={12} xl={12} xxl={6}>
          <ProjectsOverview />
        </Col>

        <Col lg={12} xl={12} xxl={6}>
          <ProjectsRoadmap />
        </Col>
      </Row>

      <Row className="justify-content-center">
        <Col xs={12} md={6} lg={6} xl={12} xxl={4}>
          <CoursesSales />
        </Col>

        <Col xs={12} md={6} lg={6} xl={6} xxl={4}>
          <TimeSpent />
        </Col>

        <Col xs={12} md={6} lg={6} xl={6} xxl={4}>
          <OurTopCourses />
        </Col>
      </Row>

      <Row>
        <Col lg={12} xl={12} xxl={6}>
          <ProjectAnalysis />
        </Col>

        <Col lg={12} xl={12} xxl={6}>
          <TeamMembers />
        </Col>
      </Row>
    </>
  );
}
