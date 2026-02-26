"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import Welcome from '@/components/MyProfile/Welcome';
import TotalProjects from '@/components/MyProfile/TotalProjects';
import TotalOrders from '@/components/MyProfile/TotalOrders';
import TotalRevenue from '@/components/MyProfile/TotalRevenue';
import ProfileIntro from '@/components/MyProfile/ProfileIntro';
import ProfileInformation from '@/components/MyProfile/ProfileInformation';
import AdditionalInformation from '@/components/MyProfile/AdditionalInformation';
import ProjectAnalysis from '@/components/MyProfile/ProjectAnalysis';
import ToDoList from '@/components/MyProfile/ToDoList';
import RecentActivity from '@/components/MyProfile/RecentActivity';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">My Profile</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>
          <Breadcrumb.Item active>
            <span className="fw-medium">My Profile</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row className="justify-content-center">
        <Col xs={12} lg={12} xl={12} xxl={6}>
          <Welcome />
        </Col>

        <Col xs={12} sm={6} lg={4} xl={4} xxl={2}>
          <TotalProjects />
        </Col>

        <Col xs={12} sm={6} lg={4} xl={4} xxl={2}>
          <TotalOrders />
        </Col>

        <Col xs={12} sm={6} lg={4} xl={4} xxl={2}>
          <TotalRevenue />
        </Col>
      </Row>

      <Row className="justify-content-center">
        <Col xs={12} lg={12} xl={4} xxl={3}>
          <ProfileIntro />

          <ProfileInformation />

          <AdditionalInformation />
        </Col>

        <Col xs={12} lg={12} xl={8} xxl={9}>
          <ProjectAnalysis />

          <ToDoList />

          <RecentActivity />
        </Col>
      </Row>
    </>
  );
}
