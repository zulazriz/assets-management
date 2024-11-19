<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Start Dashbord Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('dashboard.index.show') }}">
                <i class="bi bi-house-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if (UserHelper::isAdmin())
            <!-- Start Plan Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.plan.show') }}">
                    <i class="bi bi-trophy-fill"></i>
                    <span>Plan</span>
                </a>
            </li>
            <!-- Start Company Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.company.show') }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Companies</span>
                </a>
            </li>
            <!-- Start Coupon Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.coupon.show') }}">
                    <i class="bi bi-gift-fill"></i>
                    <span>Coupon</span>
                </a>
            </li>
        @endif
        @can('hrm')
            <!-- Start HRM System Setup Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#hrm" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-fill"></i>
                    <span>HRM System</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="hrm" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href={{ route('hrm.employee.show') }}>
                            <i class="bi bi-circle"></i><span>Employee Setup</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="payroll-nav" data-bs-target="#payroll" data-bs-toggle="collapse"
                            href="#">
                            <i class="bi bi-circle"></i>
                            <span>Payroll Setup</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="payroll" class="nav-content collapse ps-4" data-bs-parent="#payroll-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.salary.show') }}">
                                    <i class="bi bi-circle"></i><span>Set Salary</span>
                                </a>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.payslip.show') }}">
                                    <i class="bi bi-circle"></i><span>Payslip</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="leave-management-nav" data-bs-target="#leave-management"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Leave Management Setup</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="leave-management" class="nav-content collapse ps-4" data-bs-parent="#leave-management-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.leave.show') }}">
                                    <i class="bi bi-circle"></i><span>Manage Leave</span>
                                </a>
                            <li class="nav-item">
                                <a class="nav-link collapsed" id="attendance-nav" data-bs-target="#attendance"
                                    data-bs-toggle="collapse" href="#">
                                    <i class="bi bi-circle"></i>
                                    <span>Attendance</span>
                                    <i class="bi bi-chevron-down ms-auto fs-6"></i>
                                </a>
                                <ul id="attendance" class="nav-content collapse ps-4" data-bs-parent="#attendance-nav">
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('hrm.attendance-mark.show') }}">
                                            <i class="bi bi-circle"></i><span>Mark Attendance</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('hrm.attendance-bulk.show') }}">
                                            <i class="bi bi-circle"></i><span>Bulk Attendance</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="performance-setup-nav" data-bs-target="#performance-setup"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Performance Setup</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="performance-setup" class="nav-content collapse ps-4"
                            data-bs-parent="#performance-setup-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.performance-setup-indicator.show') }}">
                                    <i class="bi bi-circle"></i><span>Indicator</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.performance-setup-appraisal.show') }}">
                                    <i class="bi bi-circle"></i><span>Appraisal</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed"
                                    href="{{ route('hrm.performance-setup-goal-tracking.show') }}">
                                    <i class="bi bi-circle"></i><span>Goal Tracking</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="training-setup-nav" data-bs-target="#training-setup"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Training Setup</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="training-setup" class="nav-content collapse ps-4" data-bs-parent="#training-setup-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.training-setup-training.show') }}">
                                    <i class="bi bi-circle"></i><span>Training List</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.training-setup-trainer.show') }}">
                                    <i class="bi bi-circle"></i><span>Trainer</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="recruitment-setup-nav" data-bs-target="#recruitment-setup"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Recruitment Setup</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="recruitment-setup" class="nav-content collapse ps-4"
                            data-bs-parent="#recruitment-setup-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.recruitment-setup-job.show') }}">
                                    <i class="bi bi-circle"></i><span>Job</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.recruitment-setup-job.create') }}">
                                    <i class="bi bi-circle"></i><span>Job Create</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed"
                                    href="{{ route('hrm.recruitment-setup-job-application.show') }}">
                                    <i class="bi bi-circle"></i><span>Job Application</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link collapsed"
                                    href="{{ route('hrm.recruitment-setup-job-candidate.show') }}">
                                    <i class="bi bi-circle"></i><span>Job Candidate</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link collapsed"
                                    href="{{ route('hrm.recruitment-setup-job-onboarding.show') }}">
                                    <i class="bi bi-circle"></i><span>Job On Boarding</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed"
                                    href="{{ route('hrm.recruitment-setup-custom-question.show') }}">
                                    <i class="bi bi-circle"></i><span>Custom Question</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed"
                                    href="{{ route('hrm.recruitment-setup-interview-schedule.show') }}">
                                    <i class="bi bi-circle"></i><span>Interview Schedule</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.career-current.show') }}">
                                    <i class="bi bi-circle"></i><span>Career</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="hr-admin-setup-nav" data-bs-target="#hr-admin-setup"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>HR Admin Setup</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="hr-admin-setup" class="nav-content collapse ps-4" data-bs-parent="#hr-admin-setup-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.award.show') }}">
                                    <i class="bi bi-circle"></i><span>Award</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.transfer.show') }}">
                                    <i class="bi bi-circle"></i><span>Transfer</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.resignation.show') }}">
                                    <i class="bi bi-circle"></i><span>Resignation</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.trip.show') }}">
                                    <i class="bi bi-circle"></i><span>Trip</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.promotion.show') }}">
                                    <i class="bi bi-circle"></i><span>Promotion</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.complaint.show') }}">
                                    <i class="bi bi-circle"></i><span>Complaints</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.warning.show') }}">
                                    <i class="bi bi-circle"></i><span>Warning</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.termination.show') }}">
                                    <i class="bi bi-circle"></i><span>Termination</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.announcement.show') }}">
                                    <i class="bi bi-circle"></i><span>Announcement</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('hrm.holiday.show') }}">
                                    <i class="bi bi-circle"></i><span>Holidays</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href={{ route('hrm.event.show') }}>
                            <i class="bi bi-circle"></i><span>Event Setup</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href={{ route('hrm.meeting.show') }}>
                            <i class="bi bi-circle"></i><span>Meeting</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href={{ route('hrm.asset.show') }}>
                            <i class="bi bi-circle"></i><span>Employee Asset Setup</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href={{ route('hrm.document.show') }}>
                            <i class="bi bi-circle"></i><span>Document Setup</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href={{ route('hrm.company-policy.show') }}>
                            <i class="bi bi-circle"></i><span>Company Policy</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href={{ route('hrm.branch.show') }}>
                            <i class="bi bi-circle"></i><span>HRM System Setup</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        @can('accounting')
            <!-- Start Accounting System Setup Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#accounting" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-box-fill"></i>
                    <span>Accounting System</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="accounting" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="banking-nav" data-bs-target="#banking"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Banking</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="banking" class="nav-content collapse ps-4" data-bs-parent="#banking-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.bank-account.show') }}">
                                    <i class="bi bi-circle"></i><span>Account</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.bank-transfer.show') }}">
                                    <i class="bi bi-circle"></i><span>Transfer</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="sales-nav" data-bs-target="#sales" data-bs-toggle="collapse"
                            href="#">
                            <i class="bi bi-circle"></i>
                            <span>Sales</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="sales" class="nav-content collapse ps-4" data-bs-parent="#sales-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.customer.show') }}">
                                    <i class="bi bi-circle"></i><span>Customer</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.proposal.show') }}">
                                    <i class="bi bi-circle"></i><span>Estimate</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.invoice.show') }}">
                                    <i class="bi bi-circle"></i><span>Invoice</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.revenue.show') }}">
                                    <i class="bi bi-circle"></i><span>Revenue</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.credit-note.show') }}">
                                    <i class="bi bi-circle"></i><span>Credit Note</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="purchases-nav" data-bs-target="#purchases"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Purchases</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="purchases" class="nav-content collapse ps-4" data-bs-parent="#purchases-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.vendor.show') }}">
                                    <i class="bi bi-circle"></i><span>Suppiler</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.bill.show') }}">
                                    <i class="bi bi-circle"></i><span>Bill</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.expense.show') }}">
                                    <i class="bi bi-circle"></i><span>Expense</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.payment.show') }}">
                                    <i class="bi bi-circle"></i><span>Payment</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.debit-note.show') }}">
                                    <i class="bi bi-circle"></i><span>Debit Note</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="double-entry-nav" data-bs-target="#double-entry"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Double Entry</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="double-entry" class="nav-content collapse ps-4" data-bs-parent="#double-entry-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.chart-account.show') }}">
                                    <i class="bi bi-circle"></i><span>Chart of Account</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.journal-entry.show') }}">
                                    <i class="bi bi-circle"></i><span>Journal Account</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.ledger-summary.show') }}">
                                    <i class="bi bi-circle"></i><span>Ledger Summary</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.balance-sheet.show') }}">
                                    <i class="bi bi-circle"></i><span>Balance Sheet</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.profit-loss.show') }}">
                                    <i class="bi bi-circle"></i><span>Profit & Loss</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('accounting.trial-balance.show') }}">
                                    <i class="bi bi-circle"></i><span>Trial Balance</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('accounting.budget-planner.show') }}">
                            <i class="bi bi-circle"></i><span>Budget Planner</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('accounting.financial-goal.show') }}">
                            <i class="bi bi-circle"></i><span>Financial Goal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('accounting.tax.show') }}">
                            <i class="bi bi-circle"></i><span>Accounting Setup</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('accounting.print-setting.show') }}">
                            <i class="bi bi-circle"></i><span>Print Settings</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        @can('crm')
            <!-- CRM Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#crm" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-clipboard2-data-fill"></i>
                    <span>CRM</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="crm" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    {{-- CRM System Setup --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'crm.pipeline.show' ? 'active' : 'collapsed' }}"
                            href="{{ route('crm.pipeline.show') }}">
                            <i class="bi bi-circle"></i><span>CRM System Setup</span>
                        </a>
                    </li>

                    {{-- Leads --}}
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="leads-nav" data-bs-target="#leads" data-bs-toggle="collapse"
                            href="#">
                            <i class="bi bi-circle"></i>
                            <span>Leads</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="leads" class="nav-content collapse ps-4" data-bs-parent="#leads-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.leadIndex' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.leads') }}">
                                    <i class="bi bi-circle"></i><span>Lead List</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.leadTypes' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.leadTypes') }}">
                                    <i class="bi bi-circle"></i><span>Lead Type</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.leadSources' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.leadSources') }}">
                                    <i class="bi bi-circle"></i><span>Lead Sources</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.leadStatus' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.leadStatus') }}">
                                    <i class="bi bi-circle"></i><span>Lead Status</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Customer Loyalty --}}
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="custLoyal-nav" data-bs-target="#custLoyal"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Customer Loyalty</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="custLoyal" class="nav-content collapse ps-4" data-bs-parent="#custLoyal-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.users.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.users.index') }}">
                                    <i class="bi bi-circle"></i><span>Users</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.transactions.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.transactions.index') }}">
                                    <i class="bi bi-circle"></i><span>Transactions</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.memberships.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.memberships.index') }}">
                                    <i class="bi bi-circle"></i><span>Memberships</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.loyalty-programs.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.loyalty-programs.index') }}">
                                    <i class="bi bi-circle"></i><span>Loyalty Programs</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'crm.customer-loyalty.configuration.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('crm.customer-loyalty.configuration.index') }}">
                                    <i class="bi bi-circle"></i><span>Configuration</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        @endcan
        {{-- @can('marketplace')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#marketplace" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-shop-window"></i>
                    <span>Marketplace</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="marketplace" class="nav-content collapse ps-4" data-bs-parent="#marketplace-nav">
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="products-nav" data-bs-target="#products"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-circle"></i>
                            <span>Products</span>
                            <i class="bi bi-chevron-down ms-auto fs-6"></i>
                        </a>
                        <ul id="products" class="nav-content collapse ps-4" data-bs-parent="#products-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'marketplace.products.add-new-products.addProduct' ? 'active' : 'collapsed' }}"
                                    href="{{ route('marketplace.products.add-new-products.addProduct') }}">
                                    <i class="bi bi-circle"></i><span>Add New Product</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'marketplace.products.add-new-products.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('marketplace.products.add-new-products.index') }}">
                                    <i class="bi bi-circle"></i><span>All Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="bi bi-circle"></i><span>In House Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="bi bi-circle"></i>
                                    <span>Digital Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" id="sellerProduct-nav" data-bs-target="#sellerProduct"
                                    data-bs-toggle="collapse" href="#">
                                    <i class="bi bi-circle"></i>
                                    <span>Seller Product</span>
                                    <i class="bi bi-chevron-down ms-auto fs-6"></i>
                                </a>
                                <ul id="sellerProduct" class="nav-content collapse ps-4" data-bs-parent="#products-nav">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="bi bi-circle"></i><span>Physical Products</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="bi bi-circle"></i><span>Digital Products</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="bi bi-circle"></i><span>Bulk Import</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="bi bi-circle"></i><span>Bulk Export</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'marketplace.products.category.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('marketplace.products.category.index') }}">
                                    <i class="bi bi-circle"></i><span>Category</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="bi bi-circle"></i><span>Category Based Discount</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" id="brands-nav" data-bs-target="#brands"
                                    data-bs-toggle="collapse" href="#">
                                    <i class="bi bi-circle"></i>
                                    <span>Brand</span>
                                    <i class="bi bi-chevron-down ms-auto fs-6"></i>
                                </a>
                                <ul id="brands" class="nav-content collapse ps-4" data-bs-parent="#products-nav">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::currentRouteName() == 'marketplace.products.brands.index' ? 'active' : 'collapsed' }}"
                                            href="{{ route('marketplace.products.brands.index') }}">
                                            <i class="bi bi-circle"></i><span>All Brands</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::currentRouteName() == 'marketplace.products.brands.bulkImport' ? 'active' : 'collapsed' }}"
                                            href="{{ route('marketplace.products.brands.bulkImport') }}">
                                            <i class="bi bi-circle"></i><span>Brand Bulk Import</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'marketplace.products.attribute.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('marketplace.products.attribute.index') }}">
                                    <i class="bi bi-circle"></i><span>Attribute</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'marketplace.products.colors.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('marketplace.products.colors.index') }}">
                                    <i class="bi bi-circle"></i><span>Colors</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" id="sizeGuide-nav" data-bs-target="#sizeGuide"
                                    data-bs-toggle="collapse" href="#">
                                    <i class="bi bi-circle"></i>
                                    <span>Size Guide</span>
                                    <i class="bi bi-chevron-down ms-auto fs-6"></i>
                                </a>
                                <ul id="sizeGuide" class="nav-content collapse ps-4" data-bs-parent="#products-nav">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="bi bi-circle"></i><span>Size Chart</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="bi bi-circle"></i><span>Measurement Points</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'marketplace.products.product-reviews.index' ? 'active' : 'collapsed' }}"
                                    href="{{ route('marketplace.products.product-reviews.index') }}">
                                    <i class="bi bi-circle"></i><span>Product Reviews</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        @endcan --}}
        @can('marketplace_rsa')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('marketplace.rsa') }}">
                    <i class="bi bi-shop-window"></i>
                    <span>Marketplace RSA</span>
                </a>
            </li>
        @endcan
        @can('cosec')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('cosec.director-details.form') }}">
                    <i class="bi bi-c-circle-fill"></i>
                    <span>Cosec</span>
                </a>
            </li>
        @endcan
        @can('zoom_meeting')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('zoom-meeting.index') }}">
                    <i class="bi bi-camera-video-fill"></i>
                    <span>Zoom Meeting</span>
                </a>
            </li>
        @endcan
        @can('product')
            <!-- Start Product System Setup Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#product" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-cart-fill"></i>
                    <span>Product System</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="product" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('product.product-service.show') }}">
                            <i class="bi bi-circle"></i><span>Product & Services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('product.product-stock.show') }}">
                            <i class="bi bi-circle"></i><span>Product Stock</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        <!-- Start Support -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('support.index.show') }}">
                <i class="bi bi-chat-left-text-fill"></i>
                <span>Support</span>
            </a>
        </li>
        <!-- End Support -->
        <!-- End Upload File Nav -->
        @if (UserHelper::isAdmin())
            <!-- Start Manage User Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#admin" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-briefcase-fill"></i>
                    <span>Admin</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="admin" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('user.manage.show') }}>
                            <i class="bi bi-circle"></i><span>Manage User</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Manage User Nav -->
            <!-- Start Upload File Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('upload-file.index.show') }}">
                    <i class="bi bi-file-earmark-arrow-up-fill"></i>
                    <span>Upload File</span>
                </a>
            </li>
            <!-- End Upload File Nav -->
            <!-- Start Company Documentation Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('company-documentation.index.show') }}">
                    <i class="bi bi-file-text-fill"></i>
                    <span>Company Documentation</span>
                </a>
            </li>
            <!-- End Company Documentation Nav -->
            <!-- Start Services -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('services.index.show') }}">
                    <i class="bi bi-grid-fill"></i>
                    <span>Services</span>
                </a>
            </li>
            <!-- End Services -->
            <!-- Start Setting Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#setting" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear-fill"></i>
                    <span>Setting</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="setting" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('setting.razerms.show') }}">
                            <i class="bi bi-circle"></i><span>RazerMS</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Setting Nav -->
        @elseif(UserHelper::isUser())
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('company-documentation.user-companies') }}">
                    <i class="bi bi-grid-fill"></i>
                    <span>Services</span>
                </a>
            </li>
            <!-- Start Profile Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('profile.index.show') }}">
                    <i class="bi bi-person-fill"></i>
                    <span>Profile</span>
                </a>
            </li>
            <!-- End Profile Nav -->
        @endif
    </ul>
</aside>

<script>
    const currentLocationUrl = window.location.href.replace('#', '');

    const navLinksWithSub = document.querySelectorAll('.nav-link');
    for (const navLink of Array.from(navLinksWithSub)) {
        if (currentLocationUrl.includes(navLink.href)) {
            navLink.classList.add('active');
            navLink.classList.remove('collapsed');

            let navContent = navLink.closest('.nav-content');
            while (navContent) {
                navContent.classList.add('show');
                navContent.previousElementSibling.classList.remove('collapsed');
                navContent = navContent.parentNode.closest('.nav-content');
            }
        }
    }
</script>
